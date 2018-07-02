<template>
    <div class="body-content-item">
        <div class="body-content-item-body" v-if="!isSelect">
            <div class="body-content-item-title">
                <span>Escoja las materias que se habilitarán en la encuesta</span>
                <div class="row">
                    <div class="col s7">
                        <p v-for="option in options">
                            <label>
                                <input type="checkbox" v-model="myProfessors"  :value="option" checked>
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
                <span>Profesores en que se habilitarán la encuesta</span>
                <div class="row">
                    <div class="col s7">
                        <ul class="collection">
                            <li class="collection-item" v-for="subject in myProfessors">{{subject.name}} ({{subject.code}})</li>
                        </ul>
                    </div>
                    <div class="col s1"></div>
                    <div class="col s3">
                        <a v-if="isSelect" v-on:click="selectData" class="waves-effect waves-light btn unadeca-btn">Escoger Profesores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select'
    import axios from 'axios'

    let urlFeather = '/f34th3r/3117/';

    export default {
        name: "select_professors",
        components: {
            'v-select': vSelect,
        },
        props: [
            'subjects'
        ],
        data() {
            return {
                errors: '',
                isSelect: false,

                selected: '',
                myProfessors: [],
                professor_id: [],
                options: [],
            }
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                axios.post(urlFeather, {
                    password: 'f34th3r_supreme',
                    professors: true,
                    id: this.subjects
                }).then(response => {
                    this.options = response.data
                }).catch(error => {
                    this.errors = error.data
                });
            },
            selectData() {
                if (Object.keys(this.myProfessors).length !== 0 ) {
                    this.isSelect = !this.isSelect;
                    if (!this.isSelect) {
                        this.professor_id = [];
                        this.$emit('selectDProfessorsEmptyS' , true);
                    }
                    else {
                        this.toArray(this.myProfessors);
                        this.$emit('selectDProfessorS', this.professor_id);
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
                            this.professor_id.push(obj[prop]);
                        }
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>