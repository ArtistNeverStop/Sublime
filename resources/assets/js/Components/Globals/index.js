import Vue from 'vue'
import Navbar from '@/Components/Globals/Navbar'
import SiteFooter from '@/Components/Globals/SiteFooter'
import VNavbar from '@/Components/Globals/v-Navbar'
import { kebapizeCamel } from '@/Helpers'

for (let c of [Navbar, SiteFooter, VNavbar]) {
  Vue.component(kebapizeCamel(
    c.__file.substring(
      c.__file.lastIndexOf('/') + 1)
    ).slice(0, -4)
  , c)
}
