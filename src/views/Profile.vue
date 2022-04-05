<template>
<Header/>
    <div class="recent-orders">
  <h2>Appointment's table</h2>
  <h2> {{id}} </h2>
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
    <tbody v-for="element in rendevs">
      <tr v-if="element.id_client === id"  >
      <!-- <tr v-if="element.id_client === 'CL-54725'" > -->
        
      
          <td>{{element.id_client}}</td>
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
  import Cookies from 'js-cookie'
  // let id=Cookies.get('id')
  
  
import Header from '../components/Header.vue'
export default {
  name: 'Admin',
  components: {
    Header
  },
  data(){
    return {
      id:Cookies.get('id'),
      rendevs:[]
    }
  },
    created() {
          if (Cookies.get('id')) {
            console.log('ok')
            }else{
              console.log("nope")
              // router.push('sign_in')
              // router.go('sign_in')
              // Cookies.remove('id')
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
    
    async get_rdv(){
        let respons =await fetch("http://localhost/Gestion_rndv/breif/backend/Rendez/getAllRendez")
        this.rendevs=await respons.json() 
        
        // alert("rrr")
        // this.client="azaaz"
    
    }
  },
  mounted() {
    // console.log(this.rendevs.id_client); 
    
      this.get_rdv();
      // this.getRdvById()
    }
  
}
</script>
<style>
@import '../assets/rendev.css';
</style>