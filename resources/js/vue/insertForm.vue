<template>
    <div class="insertTask1">
        <div>
            <label>Feladat:</label><input type="text" v-model="task.task_title" />            
        </div>
        <div>
            <label>Részletek:</label><textarea rows="5"  v-model="task.task_content"/>
        </div>
        <div>
            <font-awesome-icon icon = "plus-square"
            @click="insertTask"
            :class=" [ task.task_title ? 'active' : 'inactive', 'plus' ]"
            />
        </div>
    </div>  
</template>

<script>
export default {
    data: function () {
        return {
            task: {
                task_title: "",
                task_content: ""
            }
        }
    },
    methods: {
        insertTask() {
            if ( this.task.name == '') {
                return;
            }

            axios.post('api/task/store', {
                task: this.task
            })
            .then( response => {
                if (response.status == 201) {
                    this.task.task_title == "";
                    this.task.task_content == "";
                    this.$emit('reloadlist');
                }
            })
            .catch( error => {
                consoloe.log( error );
            })
        }
    }
}
</script>

<style scoped>
.insertTask1 {
   display: block;
   width: 100%;
}
* {
 box-sizing: border-box;
}
.insertTask1 div {
        display: block;
        padding: 5px;
        width: 100%;
}

.insertTask1 div label {
    display: inline-block;
    width: 30%;
    vertical-align: top;
}
.insertTask1 div input {
    display: inline-block;
    width: 70%;
    margin: 0;
    vertical-align: top;
}
.insertTask1 div textarea {
    display: inline-block;
    width: 70%;
    height: 50px;
    vertical-align: top;
    resize: none;
}
input {
    border: 1px;
    background: #ffffff;
    outline: 1px;
    padding: 5px;
    margin-right: 12px;
    width: 100%;
}

.plus {
    font-size: 25px;
}
.active {
    color:rgb(79, 172, 79);
}
.inactive {
    color:grey;
}
</style>