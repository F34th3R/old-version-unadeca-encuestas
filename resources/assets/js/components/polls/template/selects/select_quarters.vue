<template>
    <div class="body-content-item">
        <div class="body-content-item-body" v-if="!isSelect">
            <div class="body-content-item-title">
                <span>Escoja el cuatrimestre que se habilitarán en la encuesta</span>
                <div class="row">
                    <div class="col s7">
                        <v-select v-model="selected" label="name" :options="options"></v-select>
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
                <span>Cuatrimestre seleccionado: </span>
                <div class="row">
                    <div class="col s7">
                        <ul class="collection">
                            <li class="collection-item">{{selected.name}}: {{selected.init_date}} / {{selected.end_date}}</li>
                        </ul>
                    </div>
                    <div class="col s1"></div>
                    <div class="col s3">
                        <a v-if="isSelect" v-on:click="selectData" class="waves-effect waves-light btn unadeca-btn">Escoger Cuatrimestre</a>
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
        name: "select_quarters",
        components: {
            'v-select': vSelect,
        },
        data() {
            return {
                errors: '',

                isSelect: false,

                selected: '',
                quarter_id: [],
                options: [],
            }
        },
        created() {
            this.getData()
        },
        methods: {
            getData() {
                axios.post(urlFeather, {
                    password: 'f34th3r_supreme',
                    quarters: true,
                }).then(response => {
                    this.options = response.data
                }).catch(error => {
                    this.errors = error.data
                });
            },
            selectData() {
                if (Object.keys(this.selected).length !== 0) {

                    this.isSelect = !this.isSelect;
                    if (this.isSelect) {
                        this.$emit('selectDQuarter' , this.selected.id);
                    }
                    else {
                        this.$emit('selectDQuarterEmpty' , true);
                    }
                }
            },
        }
    }
</script>

<style scoped>

</style>