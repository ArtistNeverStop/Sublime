import Vue from 'vue'
import Navbar from '@/Components/Globals/Navbar'
import SiteFooter from '@/Components/Globals/SiteFooter'
import { kebapizeCamel } from '@/Helpers'

for (let c of [Navbar, SiteFooter]) {
  Vue.component(kebapizeCamel(
    c.__file.substring(
      c.__file.lastIndexOf('/') + 1)
    ).slice(0, -4)
  , c)
}
