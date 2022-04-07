<template>
<Header/>
<!-- <p>{{info}}</p> -->
  <div>
  <div>Name: {{info.name}}</div>
  <div>Date Naissance: {{info.CIN}}</div>
  <div>Profession:{{info.profession}} </div>

  <input type="submit" value="EDIT" >
  </div>
  <form class="form" @submit.prevent="">
    <div>
    name:<input type="text" v-model="form.name"></div>
    <p> {{form.name}}</p>
   <div>
    CIN:<input type="text" v-model="form.CIN"></div> 
     <div>
    Profession:<input type="text" v-model="form.profession"></div>

  </form>
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
    </thead >
    <tbody v-for="element in rendevs" :key="element">
      <tr v-if="element.id_client === id"  >
      <!-- <tr v-if="element.id_client === 'CL-54725'" > -->
        
      
          <td>{{element.name}}</td>
          <td>{{element.date_rdv}}</td>
          <td>{{element.sujet}}</td>
          <td class="warning">{{element.creneau}}</td>
          <td class="primary"><div class="dropdown">
             
              <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item " href="#">update</a></li>
                <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
              </ul></div>
          </td>
      </tr> 
      
    </tbody>
  </table>
</div>

</template>

<script>
  import router from '@/router'
import Cookies from 'js-cookie'
  // let id=Cookies.get('id')
  
  // console.log(Cookies.get('name'))
import Header from '../components/Header.vue'
 
  const forminfo = {
    name: "",
    CIN:"",
    profession: "",
  }
export default {
  name: 'Admin',
  components: {
    Header
  },
  data(){
    return {
      id:Cookies.get('id'),
      rendevs:[],
      info: [],
      form:{forminfo}
    }
  },
    created() {
          if (Cookies.get('id')) {
            console.log("you'r in")
            }else{
              router.push('Sign_in')
          }
      },
  methods: {
    //   getRdvById(){
    //   fetch("http://localhost/Gestion_rndv/breif/backend/Rendez/getRdvById",
    //   {
    //     method : "POST",
    //     body : JSON.stringify(this.id_client)
    //   }).then(res => res.json()).then(out => console.log(out.data))
      
    // },
    getInfo(){
      const id = Cookies.get('id');
       fetch("http://localhost/Gestion_rndv/breif/backend/user/getInfo",
      {
        method: "POST",
        body: JSON.stringify(id)
      }).then(res => res.json()).then(out => {this.info = out.data ; console.log(this.info);})},
      
    updateInfo(){
      fetch("http://localhost/Gestion_rndv/breif/backend/user/updateinfo",
      {
        method: "POST",
        body: JSON.stringify()
      }).then(res=> res.json()).then(out=>console.log(out))
    },

    async get_rdv(){
        let respons =await fetch("http://localhost/Gestion_rndv/breif/backend/Rendez/getAllRendez")
        this.rendevs=await respons.json() 
        
        // alert("rrr")
        // this.client="azaaz"
    
    }
  },
  mounted() {
    // console.log(this.rendevs.id_client); 
    
      this.getInfo();
      this.get_rdv();
      // this.getRdvById()
      // console.log(form.name);
      
    }
  
}
</script>
<style>
@import '../assets/rendev.css';
</style>