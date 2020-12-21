import router from '../../Router/index'
const UserRegisterModule = {
    namespaced : true ,
    actions : {
        async registerUser( {state} , user)
        {
            await axios(`${window.location.origin}/api/register` ,
            {
                method : 'post',
                data : {
                    name : user.name,
                    email : user.email,
                    password : user.password
                },
                headers : {
                    'Accept' : 'application/json',
                    'Content-Type' : 'application/json'
                }
            })
            .then(resp=>{
                router.push('/');
            })
            .catch(err=>{
                console.log(err)
            })
        }
    }
}

export default UserRegisterModule;