<template>
    <div>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" ></a> {{name}} </li>

                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/Rendez">Reserve</a>
                </li>   
                <li class="nav-item">
                <a class="nav-link" v-on:click="logout" href="/Sign_in">Log out</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        
    </div>
</template>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
<style>
.collapse.navbar-collapse{
    justify-content: center;
}
.container-fluid{
    justify-content: flex-end;
}
</style>
<script>
// import { remove } from '@vue/shared'
import Cookies from 'js-cookie'

export default {
    data() {
        return {
            name:Cookies.get('name')
        }
    },
methods: {
    logout(){
        Cookies.remove('id')
    }

},

}

</script>