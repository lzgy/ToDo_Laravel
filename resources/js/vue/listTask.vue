<template>
    <div class = "task">
        <div class="title">
            <span :class="[task.isFinished ? 'finished' : '', 'taskText']"> 
                <div>
                    <h3>
                        <input type="checkbox" @change="updateCheck()" v-model="task.isFinished" />{{ task.task_title }}
                    </h3>
                </div>
                <div>{{ task.task_content }}</div>
                <div></div>
                <div class = "modified"><label>Módosítva: </label>{{ task.updated_at }}</div>
            </span>
        </div>
        <button @click="removeTask()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
export default {
    props: ['task'],
    methods: {
        updateCheck() {
            axios.put( 'api/task/' + this.task.id, {
                task: this.task
            })
            .then( response => {
                if( response.status == 200 ) {
                    this.$emit('taskchanged');
                }
            })
            .catch ( error => {
                console.log ( error );
            })
        },
        removeTask() {
            axios.delete( 'api/task/' + this.task.id )
            .then( response => {
                if( response.status == 200 ) {
                    this.$emit('taskchanged');
                }
            })
            .catch ( error => {
                console.log ( error );
            })
        }
    }
}
</script>

<style scoped>
.title span div h3{
    font-family: 'Brush Script MT', cursive
}
.modified{
    /*font-family: 'Brush Script MT', cursive;*/
    font-style: italic;
}
.finished {
    text-decoration: line-through;
    color: #999999;
}
.taskText {
    width: 100%;
    margin-left: 20px;   
}
.task {
    display: flex;
    justify-content: center;
    /*align-items: center;*/
}
.trashcan {
    background: #e6e6e6;
    border: none;
    color: #FF0999;
    outline: none;
}
</style>