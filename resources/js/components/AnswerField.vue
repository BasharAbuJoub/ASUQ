<template>

    <div>
        <div class="columns">
        <div class="column is-6">
            <div class="field">
                <div class="control">
                    <textarea class="textarea" rows="1" name="answer_body[]"></textarea>
                </div>
            </div>
        </div>
        <div class="column is-5">
            <div class="file has-name is-fullwidth">
                <label class="file-label">
                    <input class="file-input" type="file" name="answer_images[]" @change="fileChange()">
                    <span class="file-cta">
                        <span class="file-label">
                            Upload
                        </span>
                    </span>
                    <span  class="file-name">
                        {{name}}
                    </span>
                </label>
            </div>
        </div>
        <div class="column is-1">
            <input style="margin-top: 12px;" type="checkbox" name="is_correct[]" :value="(num-1)">
        </div>

    </div>
    <hr>
    </div>

</template>

<script>
export default {

    data(){
        return {
            name: '',
        }
    },
    methods: {
        fileChange: function(){
            this.name = event.target.files[0].name;
        }
    },
    props: {
        num: Number
    }

}
</script>
