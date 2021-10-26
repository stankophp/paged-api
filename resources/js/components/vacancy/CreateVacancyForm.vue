<template>
    <form  v-on:submit.prevent="update()">
        <div class="form-group row">
            <label for="title" class="col-sm-4 col-form-label">Title*</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="title" name="title" required
                       title="Please enter title" v-model="title">
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-sm-4 col-form-label">Location*</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="location" name="location" required
                       title="Please enter location" v-model="location">
            </div>
        </div>
        <div class="form-group row">
            <label for="salary" class="col-sm-4 col-form-label">Salary*</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="salary" name="salary" required
                       title="Please enter salary" v-model="salary">
            </div>
        </div>
        <div class="form-group row">
            <label for="salary" class="col-sm-4 col-form-label">Description*</label>
            <div class="col-sm-8">
                            <textarea name="description" id="description"
                                      class="form-control" v-model="description"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</template>

<script>
import toastMixin from "../mixins/toastMixin";

export default {
    name: "VacancyForm",

    mixins: [toastMixin],

    props: {
        //
    },

    data() {
        return {
            title: '',
            description: '',
            location: '',
            salary: 0,
        };
    },

    mounted() {
        //
    },
}
</script>

<style scoped>

</style>
