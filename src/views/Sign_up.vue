<template>
    <div class="container">
        <h1 class="wlcm">Welcome to your architecture cabinet</h1>
        <div class="overlay">
            <form class="login_form" @submit.prevent="creat_acc">
                <label class="form_header">Please fill the info below</label>
                <input class="filler" type="text" placeholder="full name" v-model="form.full_name" />
                <input class="filler p-3" type="date" placeholder="birthday" v-model="form.birthday" />
                <input class="filler" type="text" placeholder="CIN" v-model="form.CIN" />
                <input class="filler" type="text" placeholder="Job" v-model="form.Job" />

                <button type="submit">Sign up</button>
                <a href="./Sign_in">Already created account!</a>

            </form>
            <div class="image">
                <img src="../../images/background_signup.jpg" alt />
            </div>
            <!-- <p>{{out}}</p> -->
        </div>
    </div>
</template>
<script>
const initialFormState = {
    full_name: "",
    birthday: "",
    CIN: "",
    Job: ""
}
export default {
    name: "Sign_up",
    data() {
        return { form: initialFormState ,
        // out:"ww"
        }
        // return {
        //     form: { full_name: "", birthday: "", CIN: "", Job: "" },
        // }
    },
    methods: {
        creat_acc() {
            fetch("http://localhost/Gestion_rndv/breif/backend/user/add_user", {
                method: 'POST',
                body: JSON.stringify(this.form),
            }).then(res => res.json())
            .then(zed => alert("This is your id for login : "+zed.data.id))
            this.form = initialFormState;
        }
    },
}
</script>
<style lang="css" scoped>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background-color: rgb(122, 185, 233);
    /* background-color: #ffbc3557; */
}
.wlcm {
    color: rgb(0, 0, 0);
    align-self: center;
    margin-bottom: 20px;
    margin-top: 20px;
    font-size: 30px;
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
.container {
    height: 100vh;
    width: 100vw;
    /* background-image:linear-gradient(#000000ad, #797ca146),url("../../images/background_signup.jpg");
    background-size: cover;
    background-position: center;
    position: relative; */
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    /* background-color: #ffbc3598; */
}
.overlay {
    display: flex;
    align-items: center;
    height: 75%;
}
img {
    width: 50vw;
    height: 100%;
    transition: 0.5s;
    border-bottom-right-radius: 20px;
    border-top-right-radius: 20px;
}
/* img:hover {
    transform: scale(1.08);
    border-radius: 5px;
} */
.image {
    overflow: hidden;
    width: 100%;
    height: 100%;
}
.login_form {
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
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;

}
.form_header {
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
button {
    margin-bottom: 25px;
    width: 100px;
    padding: 7px;
    font-size: 18px;
    border-radius: 10px;
    border: none;
    background-color: black;
    color: rgb(255, 255, 255);
    transition: 0.4s;
}
button:hover {
    cursor: pointer;
    background-color: rgb(255, 255, 255);
    color: rgb(0, 0, 0);
    border: 1px solid black;
    transform: scale(1.1);
}
a {
    font-size: 16px;
    color: black;
}
a:hover {
    color: rgb(83, 75, 75);
}
@media (max-width: 1020px){
     img {
        
        display: none;
    }
}
@media (max-width: 930px) {
    .overlay {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .container {
        height: 100%;
        justify-content: center;
    }
    img {
        align-self: center;
        width: 80vw;
        display: none;
    }
    .login_form {
        margin-left: 0;
    }
}
</style>