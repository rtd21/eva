<template>
    <div class="container">
        <button class="btn btn-danger" type="button" @click="removeInput">-</button>
        <button class="btn btn-success" type="button" @click="addNewInput">+</button>
        <div class="form-group" v-for="(input, index) in inputs">
            <label :for="'choice' + index + startIndex + 1">Choice: {{ index + startIndex + 1}}</label>
            <input type="text" class="form-control" :id="'choice' + index + startIndex + 1"  :name="'choice[' + index + startIndex + 1 + ']'">
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'startIndex'
        ],
        data() {
            return {
                inputs: []
            }
        },
        methods: {
            addNewInput () {
                this.inputs.push(1)
            },
            removeInput() {
                if(this.inputs.length > 0) {
                    this.inputs.pop()
                }
            }
        }
    }
</script>