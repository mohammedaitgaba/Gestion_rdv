<template>
<Header/>
 
<!-- <p>{{info}}</p> -->
  <div class="body ">
    <div class="container">
      <div class="input-box">
              <span class="details">Name : </span>
              <span class="info">{{info.name}}</span>
              
      </div>
      <div class="input-box">
              <span class="details">Date Naissance: </span>
              <span class="info">{{info.date_nais}}</span>
              
      </div>
      <div class="input-box">
              <span class="details">CIN  : </span>
              <span class="info">{{info.CIN}}</span>
              
      </div>
      <div class="input-box">
              <span class="details">Profession:</span>
              <span class="info">{{info.profession}}</span>
              
      </div>

 
    <!-- <button @click=""  > -->
      <div class="button edit" @click="editForm">
    <input type="submit" value="EDIT">
    </div>
  </div>
  </div>
   <div v-show="isVisible" class="body">
      
    <div class="container">
        <div class="title"> Update</div>

      <form  @submit.prevent="updateInfo">
        <div class="user-details">
        
          <div class="input-box">
              <span class="details">Name</span>
<input type="text" v-model="form.name">
          </div>
              <div class="input-box">
                <span class="details">CIN</span>
<input type="text" v-model="form.CIN">            
  </div> <div class="input-box">
                <span class="details">Date Naissance</span>
<input type="date" v-model="form.date_nais">  </div> <div class="input-box">
                <span class="details">Profession</span>
<input type="text" v-model="form.profession">  </div>
          
          
          
        </div>
        <div class="button">
          <input type="submit" value="Update" />
        </div>
      </form>
    </div>

  </div>
<!--   
  <form class="form"  v-show="isVisible" @submit.prevent="updateInfo">
    <div>
    name:<input type="text" v-model="form.name">
    </div>
   <div>
    CIN:<input type="text" v-model="form.CIN">
    </div> 
    <div>
      Date: <input type="date" v-model="form.date_nais">
    </div>
     <div>
    Profession:<input type="text" v-model="form.profession">
    </div>
  <input type="submit" value="update">
  </form> -->
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
 
export default {
  name: 'Admin',
  components: {
    Header
  },
  data(){
    return {
      isVisible :false,
      id:Cookies.get('id'),
      rendevs:[],
      info: [],
      // form:{forminfo},
      form:{
        name: "",
        CIN:"",
        date_nais:"",
        profession: "",
        id:Cookies.get('id')
      }
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
    editForm(){
      this.isVisible = !this.isVisible
    },
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
        body: JSON.stringify(this.form)
      }).then(res=> res.json()).then(out=>console.log(out))
      // console.log(this.form)
      this.isVisible = !this.isVisible
      router.go("/");
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
    //   toggle(){
    //   if(isVisible){

    //   }else{
    //     isVisible == false;
    //   }

    // }
      
    }
  
}
</script>
<style>
@import '../assets/rendev.css';
.body {
  display: flex;
  height: 100%;
  justify-content: center;
  align-items: center; 
  padding: 10px;
  background: #fff;
}
.container{
  margin-top: 18px;
max-width: 700px;
width :100%;
background: #fff;
padding: 25px 30px;
border-radius:5px;
}
.info{
  /* margin: 64%; */
}
.container .title{
    font-size: 42px;
    font-weight: 500;
    position: relative;
}
.container .title::before{
    content: '';
    position: absolute;
    left:37.3%;
    bottom: 0;
    height: 4px;
    width: 45px;
    background-color: #000983;
}
form{}
.container form .user-details{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin: 20px 0 12px 0;
}
form .user-details .input-box{
    font-size: 18px;
    margin-bottom: 19px;
    width: calc(100% / 2 +50%);
}
form .user-details .input-box .details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}
.user-details .input-box input{
height: 45px;
width: 100%;
outline: none;
border-radius: 5px;
border: 2px solid #ccc;
padding-left:15px;
font-size: 16px;
transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
    border-color:#000983;
}
.edit{
  max-width:10%;
  margin: auto;
}
form .button{
    height: 45px;
    margin: 20px 0;
}
 .button input{
height: 56px;
width: 90%;
outline: none;
color: #fff;
font-size: 18px;
font-weight: 500;
border-radius: 5px;
letter-spacing: 1px;
background: #000983;
}
 .button input:hover{
    background: #3b48ff46;

}
input[type="date"]{
    color: #000983;
    padding: 15px;
    /* transform: translate(-50%, -50%);  */
    top:50%;
    left: 50%;
   border-radius: 5px;
border: 2px solid #ccc;
padding-left:15px;
font-size: 16px;
}
select{
    height: 45px;
width: 100%;
outline: none;
border-radius: 5px;
border: 2px solid #ccc;
padding-left:15px;
font-size: 16px;
transition: all 0.3s ease;
}
select:focus,
select:valid{
    border-color:#000983;
}
.details{
    display: flex !important;
    font-weight: 500;
}
@media (max-width: 584px){
    .container{
        max-width: 100%;
    }
    form .user-details .input-box{
        margin-bottom: 15px;
        width: 100%;
    }
    ::-webkit-calendar-picker-indicator{
        cursor: pointer;
        
    }
    
}
</style>