<template>
  <div class="container">
        <h1 class="wlcm">Welcome back dear client</h1>
    <div class="overlay">
      <div class="image"><img src="../../images/ahmed.jpg" alt=""></div>
        <form class="login_form" @submit.prevent="check_user">
            <label class="form_header"> Please entre your id  </label>
            <input class="filler" type="text" placeholder="Your ID" v-model="form.id" />
            <button type="submit">Sign in</button>
            <a href="./Sign_up">Don't have account</a>
        </form>
    </div>

 
    
  </div>
</template>



<script>
import router from "@/router"
import Cookies from 'js-cookie'

const formState = {
    id:""
}
export default {
    name : "Sign_in",
    data() {
        return {form:formState}
    },
    created() {
        
        if (Cookies.get('id')) {
            router.push('/')
        }else{
            Cookies.remove('id')
        }
    },
    methods: {
        check_user(){
            
            // check type of user
            let id =formState.id 
            let check = id.slice(0,2)
            if (check === "cl" ||check === "CL") {
                fetch("http://localhost/Gestion_rndv/breif/backend/user/check_user", {
                    method: 'POST',
                    body: JSON.stringify(this.form),

                }).then(res => {
                    if(res.status == 200)
                    {res.json()
                        .then(out => {
                            let data = out.data;
                            Cookies.set('id',out.data.id)
                            Cookies.set('name',out.data.name)
                            // console.log(data)
                            if(data) 
                            router.go('/');
                        })
                    }})
                
            }else{
                fetch("http://localhost/Gestion_rndv/breif/backend/Admin/check_admin",{
                    method: 'POST',
                    body: JSON.stringify(this.form)

                }).then(res => {
                    if(res.status == 200)
                    {res.json()
                        .then(out => {
                            let data = out.data;
                            Cookies.set('id',out.data.id)
                            Cookies.set('name',out.data.name)
                            console.log(out)
                            if(data) 
                            router.push('admin');
                        })
                    }})
                // .then(res => res.json())
                // .then(out  => console.log(out))
                
                        // .then(out => {let data = out.data;console.log(data)
                        //    Cookies.set('id',out.data.id)
                        //    Cookies.set('name',out.data.name)
                            // if(data) 
                            // router.push('admin');
                        // })
                    
            }

        }, 
    },
}
</script>




<style lang="css" scoped>
*{

    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Exo', sans-serif;

}
body{
        background-color: white;
       /* background-color: #ffbc3557; */

}
.wlcm{
    color: rgb(0, 0, 0);
    align-self: center;
    margin-bottom: 20px;
    margin-top: 20px;
    font-size: 30px;
    font-weight: 500;
    /* z-index: 10; */
}
/* .overlay{
    position: absolute;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    background-color: black;
    opacity: .6;
    z-index: 1;
} */
.container{

    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;

}
.overlay{
    display: flex;
    align-items: center;
    height: 75%;
}
img{
    width: 50vw;
    height: 100%;
    transition: 0.5s;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
 
}
/* img:hover{
        transform: scale(1.08);
       border-radius: 5px;

} */
.image{
    overflow: hidden;
    width: 100%;
    height: 100%;
    position: relative;
    left: 40px;
}
.login_form{
   display: flex;
    flex-direction: column;
    width: 350px;
    height: 100%;
    background-color: rgb(255, 255, 255);
    background-color: #d6daee91;
    justify-content: center;
    align-items: center;
    /* margin-top: 60px; */
    /* border-radius: 20px; */
    padding: 30px;
    /* margin-right: 30px; */
        /* box-shadow: 6px 4px 17px;
    mix-blend-mode: multiply; */
    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
    }
.form_header{
        font-size: 24px;
        margin-bottom: 25px;
        
    }
.filler{
    width: 250px;
    height: 40px !important;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 25px;
    font-size: 20px;
    padding: 10px;
    align-items: center;
}
button{
        margin-bottom: 25px;
        width: 100px;
        padding: 7px ;
        font-size: 18px;
        border-radius: 10px;
        border: none;
        background-color: black;
        color: rgb(255, 255, 255);
        transition: 0.4s;

}
button:hover{
    cursor: pointer;
    background-color:rgb(255, 255, 255);
    color: rgb(0, 0, 0);
    border: 1px solid black;
    transform: scale(1.1);
}
a{
    font-size: 16px;
    color: black;
}
a:hover{
        color: rgb(83, 75, 75);

}
@media (max-width: 930px) {

.overlay{
    display: flex;
    flex-direction: column;
    align-items: center;
    }
.container{
    height: 100%;
    justify-content: center;
    }
img{
    align-self: center;
    width: 80vw;
    display: none;
}
.login_form{
    margin-left: 0;
    border-radius: 10px;
}
}

</style>>
