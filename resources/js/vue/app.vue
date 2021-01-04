<template>
    <div class="toolListContainer">
        <div class="heading">
            <h1 id = "title">Todo List</h1>
            <insert-form />
        </div>
        <select-view 
            :tasks="tasks"
            v-on:reloadlist="getList()" />    
        />
    </div>
</template>

<script>
import insertForm from "./insertForm"
import selectView from "./selectView"

    export default {
        components: {
            insertForm,
            selectView
        },
        data: function () {
            return {
                tasks: []
            }
        },
        methods: {
            getList () {
                axios.get('api/tasks')
                .then( response => {
                    this.tasks = response.data
                } )
                .catch( error => {
                    console.log ( error )
                } )
            }
        },
        created() {
            this.getList();
        }       
    }
</script>

<style scoped>
    .toolListContainer{
        width: 400px;
        margin: auto;
    }

    .heading{
        background: #F8F9F9;
        padding: 10px;
    }

    #title {
        text-align: center;
    }
</style>

