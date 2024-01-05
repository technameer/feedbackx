import { defineStore } from 'pinia'
import {ref} from "vue"
export const useStore = defineStore('userStore',()=>{
    const user = ref({});
})