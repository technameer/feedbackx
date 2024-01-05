<template>
  <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
  <div class="min-h-full bg-gray-100">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                alt="Your Company">
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                  aria-current="page">Dashboard</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <button type="button"
                class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button>

              <!-- Profile dropdown -->
              <div class="relative ml-3">
                <div>
                  <button type="button"
                    class="py-1 px-2 border border-white text-white rounded" @click="logout" >Logout</button>
                </div>

                <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->

                <!-- profile dropdown -->
                <!-- <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
              </div> -->


              </div>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button"
              class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
              aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
            aria-current="page">Dashboard</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
          <div class="flex items-center px-5">
            <button type="button"
                    class="py-1 px-2 border border-white text-white rounded" @click="logout" >Logout</button>
          </div>
        </div>
      </div>
    </nav>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
        <button class="bg-indigo-400 text-white py-1 px-2 rounded" @click="open = true">Add New</button>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8" v-if="feedBacks.length > 0">
        <!-- feedbacks -->
        <div v-for="item in paginatedData" :key="item.index"
          class="w-full max-w-[70%] mx-auto bg-white mt-4 py-4 px-6 rounded shadow-md">

          <div class="flex items-center mb-2">
            <h3 class="text-lg font-semibold">Submitted By <span class="font-bold ml-2">{{ item.user.name }}</span></h3>
          </div>
          <h1 class="text-2xl font-bold mb-2">{{ item.title }}</h1>
          <p class="text-sm text-gray-600 mb-4">{{ stringToTime(item.created_at) }}</p>
          <p class="text-lg text-gray-700">{{ item.description }}</p>

          <hr class="mt-10">
          <h4 class="text-lg font-bold">Comments</h4>  

          <!-- comments -->
          <div v-for="comment in comments" :key="comment.id">
            <div v-if="comment.feedback_id === item.id" class="py-3">
              <h1 class="text-medium mb-2">Comment by <span class="font-semibold">{{comment.user.name}}</span></h1>
              <p class="text-sm text-gray-600 mb-1">{{stringToTime(comment.created_at)}}</p>
              <p class="text-lg text-gray-700 mb-3">{{comment.content}}</p>
              <hr>
            </div>
          </div>

          <!-- comments Form -->
          <form @submit.prevent="saveComment">
            <input type="hidden" :value="item.id" name="feedback_id">
            <input type="hidden" :value="store.user.id" name="user_id">
            <div class="sm:col-span-4 flex items-center mt-12">
              <input id="comment" placeholder="add a comment" required name="content" type="text" autocomplete="off"
                class="block comment w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <button type="submit" class="bg-indigo-400 text-white py-2 px-4 rounded-md ml-2">Submit</button>
            </div>
          </form>

        </div>

        <!-- pagination buttons -->
        <div class="flex justify-center items-center mt-10">
          <button @click="backPage" class="p-2 border border-gray-400 text-gray-700">prev</button>
          <button v-for="item in Math.ceil(feedBacks.length / perPage)" :key="item" @click="() => goToPage(item)"
            class="p-2 border border-gray-400 text-gray-700">
            {{ item }}
          </button>
          <button @click="nextPage" class="p-2 border border-gray-400 text-gray-700">next</button>
        </div>

      </div>
      <div v-else>
        Add feedback
      </div>
    </main>

    <!-- modal -->
    <TransitionRoot as="template" :show="open">
      <Dialog as="div" class="relative z-10" @close="open = false">
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
          leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <TransitionChild as="template" enter="ease-out duration-300"
              enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
              leave-from="opacity-100 translate-y-0 sm:scale-100"
              leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
              <DialogPanel
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <form @submit.prevent="submitFeedback">
                  <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="border-b border-gray-900/10 pb-12">
                      <h2 class="text-base font-semibold leading-7 text-gray-900 text-center">Add Feedback</h2>
                      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-6">
                          <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                          <div class="mt-2">
                            <input id="title" required v-model="formData.title" name="title" type="text"
                              autocomplete="off"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                          </div>
                        </div>

                        <div class="col-span-full">
                          <label for="description"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                          <div class="mt-2">
                            <textarea required id="description" v-model="formData.description" name="description" rows="3"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                          </div>
                          <p class="mt-3 text-sm leading-6 text-gray-600">Write feedback description</p>
                        </div>

                        <div class="sm:col-span-3">
                          <label for="category" class="block text-sm font-medium leading-6 text-gray-900">category</label>
                          <div class="mt-2">
                            <select id="category" required name="category" v-model="formData.category"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                              <option>Bug report</option>
                              <option>Feature request</option>
                              <option>Improvement</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="submit"
                      class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Submit</button>
                    <button type="button"
                      class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                      @click="open = false" ref="cancelButtonRef">Cancel</button>
                  </div>
                </form>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </div>
</template>

<script setup>
import { ref, onMounted, computed ,nextTick } from 'vue'
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
import Cookies from "js-cookie"
import { notify } from "@kyvg/vue3-notification";
import { useStore } from "../store"
import axios from "axios"
import { useRouter } from 'vue-router';
const token = Cookies.get('XSRF-TOKEN');

// state
const router = useRouter()
const store = useStore()
const open = ref(false)
const feedBacks = ref([])
const comments = ref([])
const formData = ref({
  title: "",
  description: "",
  category: "",
  user_id: store.user.id 
})


// hook
onMounted(() => {
  getFeedbacks()
  getComments()
})

// function to convert time to a readable forma
function stringToTime(string) {
  const d = new Date(string)
  return d.toLocaleString('en-US', {
    month: 'long',
    day: 'numeric',
    hour: 'numeric',
    minute: 'numeric',
    hour12: true,
  })
}


// function to submit feedback
function submitFeedback() {
  const headers = {
    'Content-Type': 'application/json',
    'Access-Control-Request-Method': 'POST',
    'X-XSRF-TOKEN': token
  };


  axios.post("api/savefeedback", formData.value, { withCredentials: true, headers })
    .then(response => {
      if (response.status == 201) {
        notify({
          title: "Feedback",
          text: "Feedback has been added successfully!",
        });
        open.value = !open.value
        getFeedbacks()
      }
    })
    .catch(errors => {
      notify({
        title: "Some error occured",
        text: errors.message,
      });
    });
}

// function to save comment
async function saveComment(e) {
  const form = e.target;

  // Access form field values
  const feedback_id = form.feedback_id.value;
  const user_id = form.user_id.value;
  const content = form.content.value;
  const headers = {
    'Content-Type': 'application/json',
    'Access-Control-Request-Method': 'POST',
    'X-XSRF-TOKEN': token
  };

  try {
    const response = await axios.post("api/savecomment", { content, user_id, feedback_id }, { withCredentials: true, headers });

    if (response.status === 201) {
      notify({
        title: "comment",
        text: "comment has been added successfully!",
      });

      getComments();
      await nextTick()
      let commentfields = document.querySelectorAll(".comment")
      commentfields.forEach(e=>{
        e.value =""
      })
    }
  } catch (errors) {
    notify({
      title: "Some error occurred",
      text: errors.message,
    });
  }
}


// function to get all feedbacks
function getFeedbacks() {
  const headers = {
    'Content-Type': 'application/json',
    'Access-Control-Request-Method': 'POST',
    'X-XSRF-TOKEN': token
  };
  axios.get("api/getfeedbacks", { withCredentials: true, headers })
    .then(response => {
      if (response.status == 200) {
        feedBacks.value = response.data.feedbacks

      }
    })
    .catch(errors => {
      notify({
        title: "Some error occured",
        text: errors.message,
      });
    });
}

// function to get all comments
function getComments(){
  axios.get("api/getallcomments", { withCredentials: true })
    .then(response => {
      if (response.status == 200) {
        comments.value = response.data.comments
      }
    })
    .catch(errors => {
      console.log(errors)
      notify({
        title: "Some error occured",
        text: errors.message,
      });
    });
}

// logout
function logout(){

  const headers = {
    'Authorization': `Bearer ${sessionStorage.getItem("token")}`,
    'Content-Type': 'application/json',
    'X-XSRF-TOKEN': token
  };

  axios.get("api/logout",{ headers, withCredentials: true })
    .then(response => {
      if (response.status == 201) {
        router.push({name:"login"})
      }
    })
    .catch(errors => {
      console.log(errors)
      notify({
        title: "Some error occured",
        text: errors.message,
      });
    });

}


// functionality to add pagination
let page = ref(1);

const perPage = 2;

const paginatedData = computed(() => {
  if (feedBacks.value) {
    return feedBacks.value.slice((page.value - 1) * perPage, page.value * perPage);
  } else {
    return [];
  }
});
function nextPage() {
  if (page.value !== Math.ceil(feedBacks.value.length / perPage)) {
    page.value += 1;
  }
}

function backPage() {
  if (page.value !== 1) {
    page.value -= 1;
  }
};

function goToPage(numPage) {
  page.value = numPage;
}
</script>