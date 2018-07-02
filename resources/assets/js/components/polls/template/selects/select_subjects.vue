<template>
    <div class="body-content-item">
        <div class="body-content-item-body" v-if="!isSelect">
            <div class="body-content-item-title">
                <span>Escoja las materias que se habilitarán en la encuesta</span>
                <div class="row">
                    <div class="col s7">
                        <p v-for="option in options">
                            <label>
                                <!--select all-->
                                <!--<input type="checkbox" v-model="selected" :value="option.id" checked>-->
                                <input type="checkbox" v-model="mySubjects"  :value="option" checked>
                                <span>{{ option.name }}</span>
                            </label>
                        </p>
                    </div>
                    <div class="col s1"></div>
                    <div class="col s3">
                        <a v-if="!isSelect" v-on:click="selectData" class="waves-effect waves-light btn unadeca-btn">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="body-content-item-body" v-if="isSelect">
            <div class="body-content-item-title">
                <span>Materias en que se habilitarán la encuesta</span>
                <div class="row">
                    <div class="col s7">
                        <ul class="collection">
                            <li class="collection-item" v-for="subject in mySubjects">{{subject.name}}</li>
                        </ul>
                    </div>
                    <div class="col s1"></div>
                    <div class="col s3">
                        <a v-if="isSelect" v-on:click="selectData" class="waves-effect waves-light btn unadeca-btn">Escoger Materias</a>
                    </div>
                </div>
            </div>
        </div>
        <select-professors v-if="isSelect" :subjects="subject_id" v-on:selectDProfessorS="getProfessorId($event)" v-on:selectDProfessorsEmptyS="isProfessorsEmpty($event)"></select-professors>
    </div>
</template>

<script>
    import vSelect from 'vue-select'
    import axios from 'axios'

    import select_professor from './select_professors'

    let urlFeather = '/f34th3r/3117/';

    export default {
        name: "select_subjects",
        props: [
            'faculties',
        ],
        components: {
            'v-select': vSelect,
            'select-professors': select_professor,
        },
        data() {
            return {
                errors: '',

                isSelect: false,

                selected: '',
                mySubjects: [],
                subject_id: [],
                options: [],
            }
        },
        created() {
            this.getData()
        },
        methods: {
            getProfessorId(getProfessorId) {
                this.$emit('selectDProfessorF' ,getProfessorId);
            },
            isProfessorsEmpty(isProfessorsEmpty) {
                if (isProfessorsEmpty) {
                    this.$emit('selectDProfessorEmptyF' , true);
                }
            },
            getData() {
                axios.post(urlFeather, {
                    password: 'f34th3r_supreme',
                    subjects: true,
                    id: this.faculties
                }).then(response => {
                    this.options = response.data
                }).catch(error => {
                    this.errors = error.data
                });
            },
            selectData() {
                if (Object.keys(this.mySubjects).length !== 0 ) {

                    this.isSelect = !this.isSelect;
                    if (!this.isSelect) {
                        this.subject_id = [];
                        this.$emit('selectDSubjectsEmpty' , true);
                        this.$emit('selectDProfessorEmptyF' , true);
                    }
                    else {
                        this.toArray(this.mySubjects);
                        this.$emit('selectDSubjects' ,this.subject_id);
                    }
                }
            },
            toArray(element) {
                for (var key in element) {
                    if (!element.hasOwnProperty(key)) continue;

                    var obj = element[key];
                    for (var prop in obj) {
                        if (!obj.hasOwnProperty(prop)) continue;

                        if (prop === 'id') {
                            this.subject_id.push(obj[prop]);
                        }
                    }
                }
            },
        },
    }
</script>

<style scoped>

</style>