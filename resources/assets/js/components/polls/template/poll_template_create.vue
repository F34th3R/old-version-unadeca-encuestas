<template>
    <div class="">
        <button class="btn btn-flat" v-on:click="getSubjects(1)">test</button>
        <form v-on:submit.prevent="" method="POST">
            <div class="body-content-item">
                <div class="body-content-item-title">
                    <span>Detalles de la encuesta</span>
                </div>
                <div class="body-content-item-title">
                    <span>Titulo: </span>
                    <p>{{title}}</p>
                </div>
                <div class="body-content-item-title">
                    <span>Titulo de descripción: </span>
                    <p>{{poll.titleDescription}}</p>
                </div>
                <div class="body-content-item-title">
                    <span>Descripción: </span>
                    <p>{{poll.description}}</p>
                </div>
                <div class="body-content-item-title">
                    <span>Instrucción: </span>
                    <p>{{poll.instruction}}</p>
                </div>
            </div>
            <div class="body-content-item">
                <div class="body-content-item-body">
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="body-content-item-title">
                                <span>Escoger el cuatrimestre en que se habilitará la encuesta</span>
                                <p v-for="quarter in quarters">
                                    <label>
                                        <input type="checkbox" v-model="newQuarter" :value="quarter.id" checked>
                                        <!--{{ Form::checkbox('questions[]', $question->id, true) }}-->
                                        <span>{{ quarter.name }}</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-content-item">
                <div class="body-content-item-body">
                    <div class="row">
                        <div class="col s12" v-if="isFaculties">
                            <div class="body-content-item-title">
                                <span>Escoger la escuela en que se habilitará la encuesta</span>
                                <p v-for="faculty in faculties">
                                    <label>
                                        <input type="checkbox" v-model="newFaculty" :value="faculty.id" checked>
                                        <!--{{ Form::checkbox('questions[]', $question->id, true) }}-->
                                        <span>{{ faculty.name }}</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="col s12 m6" v-if="!isFaculties">
                            <div class="body-content-item-title">
                                <span>Escoger la materia en que se habilitará la encuesta</span>
                                <p v-for="subject in subjects">
                                    <label>
                                        <input type="checkbox" v-model="newSubject" :value="subject.id" checked>
                                        <span>{{ subject.name }}</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <a v-if="isFaculties" v-on:click="getSubjects(newFaculty)" class="waves-effect waves-light btn unadeca-btn">Buscar materias</a>
                        <a v-if="!isFaculties" v-on:click="isFaculty()" class="waves-effect waves-light btn unadeca-btn">Escoger Escuelas</a>
                    </div>
                </div>
            </div>
            <div class="body-content-item-body">
                <div class="body-content-item-title">
                    <span>Escoger las preguntas que aparecerán en la encuesta</span>
                    <p v-for="question in questions">
                        <label>
                            <input  type="checkbox" v-model="newQuestions" :value="question.id" checked>
                            <!--{{ Form::checkbox('questions[]', $question->id, true) }}-->
                            <span>{{ question.question }}</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="form-group center-align" style="margin-bottom: 20px">
                <button type="submit" class="waves-effect waves-light btn unadeca-btn">
                    Create
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    let myPass = "f34th3r_3117";
    let urlQuarters = "/f34th3r/quarters/3117/" + myPass;
    let urlProfessors = "/f34th3r/professors/3117/" + myPass;
    let urlFaculties = "/f34th3r/faculties/3117/" + myPass;
    let urlItems = "/f34th3r/items/3117/" + myPass;
    export default {
        name: "poll_template_create",
        props: [
            'poll',
            'title',
            'questions',
            // 'faculties',
            // 'subjects',
            // 'professor',
            // 'quarters',
            // 'item',
        ],
        data() {
            return {
                errors: '',
                test: '',
                //
                newId: this.poll.id,
                newTitle: this.poll.titles_id,
                newTitleDescription: this.poll.titleDescription,
                newDescription: this.poll.description,
                newInstruction: this.poll.instruction,

                // intermediate table
                newQuarter: [],
                newQuestions: [],
                newFaculty: [],
                newSubject: [],
                newProfessor: [],

                // getData
                subjects: '',
                quarters: '',
                faculties: '',
                professors_id: '',
                items: '',

                // isOn
                isOnQuarters: true,
                isFaculties: true,
            }
        },
        created() {
            this.getData();
        },
        methods: {
            isOnQuarter(){
                this.isOnQuarters = !this.isOnQuarters;
                if (this.isFaculties === true) {
                    this.subjects = '';
                }
            },
            isFaculty(){
                if (this.newFaculty === "") {
                    this.newFaculty = '';
                }else {
                    this.isFaculties = !this.isFaculties;
                    this.subjects = '';
                }
            },
            getSubjects(id) {
                if (this.newFaculty !== '') {
                    this.isFaculty();
                    this.newFaculty.forEach(e => {
                        axios.get("/f34th3r/subjects/"+ e + "/" + myPass).then(response => {
                            // console.log(e);
                            console.log(Object(response.data));
                            let data = response.data;
                            if (this.subjects.length === 0) {
                                this.subjects = data;
                            }
                            else {
                                // let test = Object.assign(this.subjects, data);
                                this.test = Object.create(this.subjects);
                                this.test.data
                            }

                        }).catch(error => {
                            this.errors = error.response;
                        });
                    });
                }
            },
            getData() {
                axios.get(urlQuarters).then(response => {
                    this.quarters = response.data;
                });
                axios.get(urlProfessors).then(response => {
                    this.professors_id = response.data;
                });
                axios.get(urlFaculties).then(response => {
                    this.faculties = response.data;
                });
                axios.get(urlItems).then(response => {
                    this.items = response.data;
                });


            },
            // createData() {
            //     var url = 'polls.store';
            //     axios.post(url, {
            //         name: this.newName,
            //         description: this.newDescription,
            //         instruction: this.newInstruction,
            //     }).then(response =>{
            //         this.getDate();
            //         this.cleanVariables();
            //         Materialize.toast("Nueva titulo creada con éxito", 10000, '', function () {/**/});
            //     }).catch(error => {
            //         Materialize.toast("Error, faltan datos!", 10000, 'rounded', function () {/**/});
            //         this.errors = error.response.data;
            //     });
            // }
        },
    }
</script>

<style scoped>

</style>