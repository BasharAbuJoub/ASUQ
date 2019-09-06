<template>

    <div>
        <div class="columns" style="margin-bottom: 0;">
            <div class="column is-12" >
                <h4 class="title is-4 is-pulled-left" style="margin-bottom: 0;">Answers</h4>
                <button @click="removeField()" type="button"
                    class="button is-danger is-pulled-right">Remove</button>
                <button @click="addField()" type="button"
                    class="button is-success is-pulled-right"
                    style="margin-right: 10px;">Add</button>
            </div>
        </div>
        <div>
            <answer-field v-for="index in count" :key="index" :num="index"></answer-field>
        </div>
    </div>

</template>

<script>
export default {

    data(){
        return {
            name: '',
            imgSource: '',
            count: 1
        }
    },
    methods: {
        fileChange: function(){
            this.name = event.target.files[0].name;
            this.imgSource = URL.createObjectURL(event.target.files[0]);
        },
        addField(){
            this.count++;
        },
        removeField(){
            if(this.count > 1)
                this.count--;
        }
    }

}
</script>
