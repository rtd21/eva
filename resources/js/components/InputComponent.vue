<template>
    <div class="container">
        <button class="btn btn-danger" type="button" @click="removeInput">-</button>
        <button class="btn btn-success" type="button" @click="addNewInput">+</button>
        <div class="form-group" v-for="(input, index) in inputs">
            <label :for="'choice' + index">Choice: {{ index }}</label>
            <input type="text" class="form-control" :id="'choice' + index"  :name="'choice[' + index + ']'">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                inputs: [
                    {
                        name: ''
                    }
                ]
            }
        },
        methods: {
            addNewInput () {
                this.inputs.push({
                    name: 'new'
                })
            },
            removeInput() {
                if(this.inputs.length > 1) {
                    this.inputs.pop()
                }
            }
        },
        mounted() {
            console.log('Component exeeee.')
        }
    }
</script>