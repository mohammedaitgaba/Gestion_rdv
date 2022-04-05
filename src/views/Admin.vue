<template>
<div>
<Header/>


<div class="recent-orders">
  <h2>Appointment's table</h2>
  <table>
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Date Rendez-vous</th>
        <th>Sujet</th>
        <th>Creneau</th>
        <th></th>

      </tr>
    </thead>
    <tbody v-for="element in rendevs">

      <tr>
          <td >{{element.name}}</td>
          <td>{{element.date_rdv}}</td>
          <td>{{element.sujet}}</td>
          <td class="warning">{{element.creneau}}</td>
          <td class="primary"><div class="dropdown">
             
              <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item " href="#">show more</a></li>
                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
              </ul></div>
          </td>
      </tr> 
      
    </tbody>
  </table>
</div>
</div>
</template>

<script>
import Cookies from 'js-cookie'
import Header from '../components/Header.vue'
export default {
  name: 'Admin',
  components: {
    Header
  },
  data(){
    return {
    rendevs:[],

    }
  },
  methods: {
    async get_rdv(){
        let respons =await fetch("http://localhost/Gestion_rndv/breif/backend/Rendez/getAllRendez")
        this.rendevs=await respons.json() 
        
    },
     },
    mounted() {
        this.get_rdv();
      }
    
}
</script>
<style scoped>
@import '../assets/rendev.css';
</style>