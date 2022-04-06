<template>
<div>
<Header/>
<div class="recent-orders">
  <h2>Client table</h2>
  <table>
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Birthday</th>
        <th>CIN</th>
        <th>profession</th>
        

      </tr>
    </thead>
    <tbody v-for="element in users">

      <tr>
        
          
          <td >{{element.name}}</td>
          <td>{{element.date_nais}}</td>
          <td>{{element.CIN}}</td>
          <td class="warning">{{element.profession}}</td>
          <td class="primary"><div class="dropdown">
             
              <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item " href="#"> show more</a></li>
                <li><a class="dropdown-item text-danger" v-on:click="delete_user(element.id)">Delete</a></li>
                
              </ul></div>
          </td>
      </tr> 
      
    </tbody>
  </table>
</div>
</div>

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
          
          <td>{{element.name}}</td>
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

</template>

<script>
// setTimeout(() =>check_admin() , 1000);
import router from '@/router'
import Cookies from 'js-cookie'

import Header from '../components/Header.vue'
let id_check =  Cookies.get('id')
// const formState = {
//     idd:""
// }
// const formState = {
//     id:""
// }
export default {
  name: 'Admin',
  components: {
    Header
  },
  data(){
    return {
    rendevs:[],
    users:[],
    // id:"",
  //  form:{formState}
    }
  },
  methods: {
        delete_user(id){

      console.log(id)
         fetch("http://localhost/Gestion_rndv/breif/backend/user/delete_user",
      {
      method : "POST",
      body : JSON.stringify(id)
      }).then(res => res.json()).then(out => console.log(out))

      router.go('admin')
      },
    async get_rdv(){
      let respons =await fetch("http://localhost/Gestion_rndv/breif/backend/Rendez/getAllRendez")
        
        this.rendevs=await respons.json() 
        
    },
    async get_users(){
      let respons =await fetch("http://localhost/Gestion_rndv/breif/backend/User/getAllusers")
      // this.data=await respons.json() 
      this.users=await respons.json() 
      
    },
    
    //  check_admin(){
    //   console.log(id_check);
    //   if(id_check == "AD_1234"){

    //     console.log("welcome")
    //     }else{
    //     console.log(id_check)
    //     router.push('Sign_up')
    //   }
    // }
     },
       


    


    mounted() {
      this.get_rdv();
      this.get_users();
        // this.check_admin();
        // delete_user()
      },
   
}


</script>
<style scoped>
@import '../assets/rendev.css';
</style>