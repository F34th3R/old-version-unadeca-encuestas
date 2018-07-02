<template>
    <div class="">
        <div class="body-content-item">
            <div class="body-content-item-body" v-if="!isSelect">
                <div class="body-content-item-title">
                    <span>Escoja las facultades que se habilitarán en la encuesta</span>
                    <div class="row">
                        <div class="col s12 l7">
                            <v-select multiple v-model="selected" label="name" :options="options"></v-select>
                        </div>
                        <div class="col l1"></div>
                        <div class="col s12 l3">
                            <a v-if="!isSelect" v-on:click="selectData" class="waves-effect waves-light btn unadeca-btn">Aceptar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-content-item-body" v-if="isSelect">
                <div class="body-content-item-title">
                    <span>Facultades seleccionado: </span>
                    <div class="row">
                        <div class="col s12 l7">
                            <ul class="collection">
                                <li class="collection-item" v-for="select in selected">{{select.name}}</li>
                            </ul>
                        </div>
                        <div class="col l1"></div>
                        <div class="col s12 l3">
                            <a v-if="isSelect" v-on:click="selectData" class="waves-effect waves-light btn unadeca-btn">Escoger Facultades</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <select-subjects v-if="isSelect" :faculties="faculty_id" v-on:selectDSubjects="getSubjectId($event)" v-on:selectDSubjectsEmpty="isSubjectsEmpty($event)" v-on:selectDProfessorF="getProfessorId($event)" v-on:selectDProfessorEmptyF="isProfessorsEmpty($event)"></select-subjects>
    </div>
</template>

<script>
    import vSelect from 'vue-select'
    import axios from 'axios'

    import select_subjects from './select_subjects'

    let urlFeather = '/f34th3r/3117/';
    export default {
        name: "select_faculties",
        components: {
            'v-select': vSelect,
            'select-subjects': select_subjects,
        },
        data() {
            return {
                errors: '',

                isSelect: false,
                isSelectSubject: false,

                selected: '',
                options: [],

                faculty_id: [],
                optionsSubjects: [],
            }
        },
        created() {
            this.getFaculties()
        },
        methods: {
            getProfessorId(getProfessorId) {
                this.$emit('selectDProfessor' ,getProfessorId);
            },
            isProfessorsEmpty(isSubjectsEmpty) {
                if (isSubjectsEmpty) {
                    this.$emit('selectDProfessorEmpty' , true);
                }
            },
            getSubjectId(getSubjectId) {
                this.$emit('selectDSubject' ,getSubjectId);
            },
            isSubjectsEmpty(isSubjectsEmpty) {
                if (isSubjectsEmpty) {
                    this.$emit('selectDSubjectsEmpty' , true);
                }
            },
            getFaculties() {
                axios.post(urlFeather, {
                    password: 'f34th3r_supreme',
                    faculties: true,
                }).then(response => {
                    this.options = response.data
                }).catch(error => {
                    this.errors = error.data
                });
            },
            selectData() {
                if (Object.keys(this.selected).length !== 0 ) {

                    this.isSelect = !this.isSelect;
                    if (!this.isSelect) {
                        this.faculty_id = [];
                        this.$emit('selectDFacultyEmpty' , true);
                        this.$emit('selectDSubjectsEmpty' , true);
                        this.$emit('selectDProfessorEmpty' , true);
                    }
                    else {
                        this.toArray(this.selected);
                        this.$emit('selectDFaculty' ,this.faculty_id);
                    }
                }
            },
            toArray(element) {
                for (var key in element) {
                    if (!element.hasOwnProperty(key)) continue;

                    var obj = element[key];
                    for (var prop in obj) {
                        if(!obj.hasOwnProperty(prop)) continue;

                        if (prop === 'id'){
                            this.faculty_id.push(obj[prop]);
                        }
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>