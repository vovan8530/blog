<template>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pictures list</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <a :href="routes.pictureCreate" class="btn btn-info mb-2">Create new picture</a>
            </div>
        </div>

        <div class="row">

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-3" v-for="picture in pictures.data">
                <button>Delete</button>
                <div class="card bg-dark text-white">
                    <img :src="`/${picture.thumbnail}`" class="card-img">
                </div>
            </div>

        </div>
        <div class="row my-3">
<!--            {{$pictures->links()}}-->
        </div>
    </div>

</template>

<script>
    export default {
        name: 'AdminPicturesIndex',
        props:{
            routes:{},
            pictures:{},
        }
    }
</script>

<style scoped>

</style>
