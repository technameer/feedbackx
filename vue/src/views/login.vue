<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" @submit.prevent="login" action="#" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" v-model="formData.email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <p v-text="errors.email"></p>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <input id="password" v-model="formData.password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>

        <p v-text="errors.password"></p>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

    <router-link :to="{name:'register'}" class="mt-3 flex justify-center ">Don't have an account?</router-link>
  </div>
</div>

</template>
<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import Cookies from "js-cookie"
import axios from 'axios';
const router = useRouter()
const formData = ref({
    email: '',
    password: '',
    device_name: 'browser'
})
const errors = ref({})
async function login(){
  await axios.get("/sanctum/csrf-cookie");
  const token = Cookies.get('XSRF-TOKEN');
  const headers = {
    'Content-Type': 'application/json',
    'Access-Control-Request-Method': 'POST',
    'X-XSRF-TOKEN': token
  };


  axios.post("api/login", formData.value, { withCredentials:true,headers })
    .then(response => {
      sessionStorage.setItem("token",response.data)
      router.push({name:'dashboard'})
    })
    .catch(errors => {
      console.error('Error:', errors);
    });
}
</script>