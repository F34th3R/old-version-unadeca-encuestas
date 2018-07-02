<template>
    <form v-on:submit.prevent="createData()" method="POST">
        <div class="body-content-item">
            <div class="body-content-item-title" id="errorPoll">
                <span>Crear encuesta</span>
            </div>

            <div class="col s12" v-if="isError">
            </div>

            <div class="body-content-item-title">
                <span>Titulo: </span>
                <ul class="collection">
                    <li class="collection-item">{{title}}</li>
                </ul>
            </div>
        </div>
        <div class="col s12" v-if="isError">
            <ul class="collection">
                <li class="collection-item red-text">{{ errors }}</li>
            </ul>
        </div>
        <select-quarters v-on:selectDQuarter="getQuarterId($event)" v-on:selectDQuarterEmpty="isQuarterEmpty($event)"></select-quarters>
        <select-faculties v-on:selectDFaculty="getFacultyId($event)" v-on:selectDFacultyEmpty="isFacultyEmpty($event)" v-on:selectDSubject="getSubjectId($event)" v-on:selectDSubjectsEmpty="isSubjectEmpty($event)" v-on:selectDProfessor="getProfessorId($event)" v-on:selectDProfessorEmpty="isProfessorEmpty($event)"></select-faculties>

        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Habilitar: </span>
                <ul class="collection">
                    <li class="collection-item">
                        <label>
                            <input v-model="newClose" type="radio" :value="true" checked/>
                            <span>Si</span>
                        </label>
                    </li>
                    <li class="collection-item">
                        <label>
                            <input v-model="newClose" type="radio" :value="false"/>
                            <span>No</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Crear Modelo para otras encuestas?</span>
                <ul class="collection">
                    <li class="collection-item">
                        <label>
                            <input v-model="newModel" type="radio" :value="true" checked/>
                            <span>Si</span>
                        </label>
                    </li>
                    <li class="collection-item">
                        <label>
                            <input v-model="newModel" type="radio" :value="false"/>
                            <span>No</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Crear encuesta</span>
            </div>
            <div class="body-content-item-title">
                <span>Escoger las preguntas que aparecerán en la encuesta</span>
                <ul class="collection">
                    <li class="collection-item" v-for="question in questions">
                        <label>
                            <input type="checkbox" v-model="newQuestions"  :value="question.id" checked>
                            <span>{{ question.question }}</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group center-align" style="margin-bottom: 20px">
            <!--<a v-on:click="createData" class="waves-effect waves-light btn unadeca-btn">Test</a>-->
            <!--<input type="submit" class="waves-effect waves-light btn unadeca-btn white-text" value="Guardar">-->
            <button type="submit" class="waves-effect waves-light btn unadeca-btn">
                Guardar
            </button>
        </div>
    </form>
</template>

<script>
    import axios from 'axios'
    import vue_select from 'vue-select'

    import select_quarters from './selects/select_quarters'
    import select_faculties from './selects/select_faculties'

    let urlFeather = '/f34th3r/3117/';

    export default {
        name: "poll_template_create",
        props: [
            'poll',
            'title',
            'title_id',
            'questions',
        ],
        components: {
            'vue-select': vue_select,
            'select-quarters': select_quarters,
            'select-faculties': select_faculties,
        },
        data() {
            return {
                errors: '',
                isError: false,
                // initial data
                newId: this.poll.id,
                newTitle: this.poll.titles_id,
                newTitleDescription: this.poll.titleDescription,
                newDescription: this.poll.description,
                newInstruction: this.poll.instruction,
                // final data
                newQuarter: '',
                newQuestions: [],
                newFaculty: [],
                newSubject: [],
                newProfessor: [],
                newClose: true,

                newModel: false,
            }
        },

        created() {
            this.toArray(this.questions)
        },
        methods: {
            getTitle() {
                axios.post(urlFeather, {
                    password: 'f34th3r_supreme',
                    title: true,
                    id: this.title_id
                }).then(response => {
                    console.log('test title');
                    this.options = response.data
                }).catch(error => {
                    this.errors = error.data
                });
            },

            getQuarterId(getQuarterId) {
                this.newQuarter = getQuarterId;
            },
            isQuarterEmpty(isQuarterEmpty) {
                if (isQuarterEmpty) {
                    this.newQuarter = [];
                }
            },

            getFacultyId(getFacultyId) {
                this.newFaculty = getFacultyId;
            },
            isFacultyEmpty(isFacultyEmpty) {
                if (isFacultyEmpty) {
                    this.newFaculty = [];
                }
            },

            getSubjectId(getSubjectId) {
                this.newSubject = getSubjectId;
            },
            isSubjectEmpty(isSubjectEmpty) {
                if (isSubjectEmpty) {
                    this.newSubject = [];
                }
            },

            getProfessorId(getProfessorId) {
                this.newProfessor = getProfessorId;
            },
            isProfessorEmpty(isProfessorEmpty) {
                if (isProfessorEmpty) {
                    this.newProfessor = [];
                }
            },
            toArray(element) {
                for (var key in element) {
                    if (!element.hasOwnProperty(key)) continue;

                    var obj = element[key];
                    for (var prop in obj) {
                        if(!obj.hasOwnProperty(prop)) continue;

                        if (prop === 'id'){
                            this.newQuestions.push(obj[prop]);
                        }
                    }
                }
            },
            scrollInto() {
                let elmnt = document.getElementById("errorPoll");
                elmnt.scrollIntoView();
            },
            isE(value) {
                this.errors = value;
                if (this.isError) {
                    this.scrollInto();
                }
            },
            createData() {
                if (this.title_id === 1){
                    if (this.newQuarter.length !== 0 && this.newFaculty.length !== 0 && this.newSubject.length !== 0 && this.newProfessor.length !== 0) {
                        this.isError = false;
                        axios.post('/polls/store/', {
                            titlesid: this.title_id,
                            titleDescription: this.newTitleDescription,
                            description: this.newDescription,
                            instruction: this.newInstruction,
                            quartersid: this.newQuarter,
                            isClose: this.newClose,

                            questions: this.newQuestions,
                            faculties: this.newFaculty,
                            subjects: this.newSubject,
                            professors: this.newProfessor,
                            model: this.newModel,
                        }).then(response =>{
                            window.location.replace("/polls/");
                            // console.log(response.data);
                        }).catch(error => {
                            this.isError = true;
                            console.log("no se puede completar");
                            this.isE("No se pudo completar la acción.");
                        });
                    }
                    else {
                        this.isError = true;
                        this.isE("Faltan datos para poder completar la encuesta");
                    }

                }

                // TODO Modificar esta parte: para poder ver que tipo de encuesta es, ya que no todas las encuestas se guardan igual, as[i que se va a decidir por medio del titulo, para esto también va a cambiar la vista del Template
                if (this.title === 2) {
                    if (this.newQuarter.length !== 0 && this.newFaculty.length !== 0 && this.newSubject.length !== 0 && this.newProfessor.length !== 0) {
                        this.isError = false;
                        axios.post('/polls/store/', {
                            titlesid: this.title_id,
                            titleDescription: this.newTitleDescription,
                            description: this.newDescription,
                            instruction: this.newInstruction,
                            quartersid: this.newQuarter,
                            isClose: this.newClose,

                            questions: this.newQuestions,
                            faculties: this.newFaculty,
                            subjects: this.newSubject,
                            professors: this.newProfessor,
                            model: this.newModel,
                        }).then(response =>{
                            window.location.replace("/polls/");
                            // console.log(response.data);
                        }).catch(error => {
                            this.isError = true;
                            console.log("no se puede completar");
                            this.isE("No se pudo completar la acción.");
                        });
                    }
                    else {
                        this.isError = true;
                        this.isE("Faltan datos para poder completar la encuesta");
                    }
                }
                if (this.title === 3) {
                    if (this.newQuarter.length !== 0 && this.newFaculty.length !== 0 && this.newSubject.length !== 0 && this.newProfessor.length !== 0) {
                        this.isError = false;
                        axios.post('/polls/store/', {
                            titlesid: this.title_id,
                            titleDescription: this.newTitleDescription,
                            description: this.newDescription,
                            instruction: this.newInstruction,
                            quartersid: this.newQuarter,
                            isClose: this.newClose,

                            questions: this.newQuestions,
                            faculties: this.newFaculty,
                            subjects: this.newSubject,
                            professors: this.newProfessor,
                            model: this.newModel,
                        }).then(response =>{
                            window.location.replace("/polls/");
                            // console.log(response.data);
                        }).catch(error => {
                            this.isError = true;
                            console.log("no se puede completar");
                            this.isE("No se pudo completar la acción.");
                        });
                    }
                    else {
                        this.isError = true;
                        this.isE("Faltan datos para poder completar la encuesta");
                    }
                }
                if (this.title === 4) {
                    if (this.newQuarter.length !== 0 && this.newFaculty.length !== 0 && this.newSubject.length !== 0 && this.newProfessor.length !== 0) {
                        this.isError = false;
                        axios.post('/polls/store/', {
                            titlesid: this.title_id,
                            titleDescription: this.newTitleDescription,
                            description: this.newDescription,
                            instruction: this.newInstruction,
                            quartersid: this.newQuarter,
                            isClose: this.newClose,

                            questions: this.newQuestions,
                            faculties: this.newFaculty,
                            subjects: this.newSubject,
                            professors: this.newProfessor,
                            model: this.newModel,
                        }).then(response =>{
                            window.location.replace("/polls/");
                            // console.log(response.data);
                        }).catch(error => {
                            this.isError = true;
                            console.log("no se puede completar");
                            this.isE("No se pudo completar la acción.");
                        });
                    }
                    else {
                        this.isError = true;
                        this.isE("Faltan datos para poder completar la encuesta");
                    }
                }
                if (this.title === 5) {
                    if (this.newQuarter.length !== 0 && this.newFaculty.length !== 0 && this.newSubject.length !== 0 && this.newProfessor.length !== 0) {
                        this.isError = false;
                        axios.post('/polls/store/', {
                            titlesid: this.title_id,
                            titleDescription: this.newTitleDescription,
                            description: this.newDescription,
                            instruction: this.newInstruction,
                            quartersid: this.newQuarter,
                            isClose: this.newClose,

                            questions: this.newQuestions,
                            faculties: this.newFaculty,
                            subjects: this.newSubject,
                            professors: this.newProfessor,
                            model: this.newModel,
                        }).then(response =>{
                            window.location.replace("/polls/");
                            // console.log(response.data);
                        }).catch(error => {
                            this.isError = true;
                            console.log("no se puede completar");
                            this.isE("No se pudo completar la acción.");
                        });
                    }
                    else {
                        this.isError = true;
                        this.isE("Faltan datos para poder completar la encuesta");
                    }
                }
                // else {
                //     console.log("normal")
                // }
            }
        },
    }
</script>

<style scoped>

</style>