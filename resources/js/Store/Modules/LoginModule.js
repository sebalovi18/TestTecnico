const LoginModule = {
    namespaced : true,
    state : {
        user : {
            email : "sebalovi12@gmail.com",
            password : "1234123"
        }
    },
    getters : {

    },
    actions : {
        async signIn({state}){
            await axios.post(`${window.location.origin}` , state.user)
                    .then(res=>console.log(res))
                    .cath(err=>console.log(err))
        }
    }
}

export default LoginModule;