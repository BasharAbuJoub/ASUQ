<template>

    <div class="columns">

        <div class="column is-6">
            <label class="label">Question Image (optional)</label>
            <div class="file has-name is-fullwidth">
                <label class="file-label">
                    <input class="file-input" type="file" name="image" @change="fileChange()">
                    <span class="file-cta">
                        <span class="file-label">

                            Upload Image
                        </span>
                    </span>
                    <span  class="file-name">
                        {{name}}
                    </span>
                </label>
            </div>
        </div>
        <div class="column is-6">
            <div class="has-text-centered">
                <img style="max-height: 400px; " class="is-centered" :src="imgSource" v-if="imgSource != ''" alt="">
            </div>
        </div>

    </div>

</template>

<script>
export default {

    data(){
        return {
            name: '',
            imgSource: ''
        }
    },
    methods: {
        fileChange: function(){
            this.name = event.target.files[0].name;
            this.imgSource = URL.createObjectURL(event.target.files[0]);
        }
    }

}
</script>
