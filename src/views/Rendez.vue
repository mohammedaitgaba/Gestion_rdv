<template>
    <Header/>
  <div class="body">
      
    <div class="container">
        <div class="title"> Reserver</div>
      <form>
          <!-- name	date_rdv	sujet	creneau	id_client	 -->
        <div class="user-details">
         
          <div class="input-box">
              <span class="details">Sujet</span>
            <input type="text" placeholder="taper votre haja" required />
          </div>
              <div class="input-box">
                <span class="details">Date de Rendez-Vous</span>
                <input type="date" placeholder="taper votre haja" required />
              </div>
          <div class="input-box">
            <span class="details">Creneau</span>
            <select>
                <option>10h à 10:30h</option>
                <option>11 h à 11:30h</option>
                <option>14 h à 14:30h</option>
                <option>15 h à 15:30h</option>
                <option>16 h à 16:30h</option>
            </select>
          </div>
          <!-- <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="taper votre haja" required />
          </div> -->
        </div>
        <div class="button">
          <input type="submit" value="Reserver" />
        </div>
      </form>
    </div>

  </div>
</template>
<script>
    import Header from '../components/Header.vue'
    export default {
  name: 'HomeView',
  components: {
    // HelloWorld,
    Header
  }
}
</script>
<style lang="css" scoped>
/* add font import */
@import url('https://fonts.googleapis.com/css2?family=Exo:wght@400;500;600&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
   font-family: 'Exo', sans-serif; 
   color: #2c3e50;
}
.body {
  display: flex;
  height: 100%;
  justify-content: center;
  align-items: center; 
  padding: 10px;
  background: #eee;
}
.container{
  margin-top: 30px;
max-width: 700px;
width :100%;
background: #fff;
padding: 25px 30px;
border-radius:5px;
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
.container form .user-details{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    margin: 20px 0 12px 0;
}
form .user-details .input-box{
    font-size: 18px;
    margin-bottom: 40px;
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
form .button{
    height: 45px;
    margin: 45px 0;
}
form .button input{
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
form .button input:hover{
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
