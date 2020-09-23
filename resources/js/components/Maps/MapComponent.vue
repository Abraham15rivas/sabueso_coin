<template>

  <div class="mt-5" v-if="show">
    <l-map style="height: 550px" :zoom="zoom" :center="center">

      <l-tile-layer 
        :url="url"
        :attribution="attribution">
      </l-tile-layer>

      <l-control-attribution 
        position="topright" 
        prefix="Mapa de puntos glufco">
      </l-control-attribution>  
      
      <div v-for="company in allCompanies" :key="company.id">

        <l-marker
          v-if="ready" 
          :lat-lng="company.upn_coordinates | parseArray"
          :icon="icon">

          <l-icon
            :icon-size="dynamicSize"
            :icon-anchor="dynamicAnchor"
            :icon-url="url_img">
          </l-icon>

          <l-popup>
            <div @click="companyData(company)">
              <p class="text-dark" v-text="company.description"></p>
              <a href="#">Detalles</a>
            </div>
          </l-popup>

          <l-tooltip 
            :options="options" 
            :content="company.name">
          </l-tooltip>

        </l-marker>

      </div>

    </l-map>
  </div>

  <div v-else>
    <company-show-component
      :company="company"
      :check_user="check_user">
    </company-show-component>
  </div>

</template>
<script>

import { latLng, icon } from "leaflet";
export default {
  inheritAttrs: false,
  props: ['check_user'],
  data () {
    return {
      show: true,
      company: [],
      allCompanies: [],
      attribution:'&copy; <a href="http://www.instagram.com/abraham.r.j" target="_blank">@abraham.r.j</a> contributors',
      url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
      zoom: 5.5,
      center: [8.655767, -66.354306],
      markerLatLng: '',
      iconSize: 64,
      ready: false,
      url_img: this.iconImg(),
      icon: icon({
        iconUrl: this.iconImg(),
        iconSize: [32, 37],
        iconAnchor: [16, 37]
      }),
      options: { 
        permanent: false, 
        interactive: true 
      }
    };
  },
  created() {
    this.getGlufco();
  },
  methods: {
    iconImg() {
      return "img/monedas/glufco.png"
    },
    getGlufco() {
        let self = this
        axios.get('/glufco').then( response => {
            self.allCompanies = response.data
            self.ready = true
        });
    },
    companyData(company) {
      this.show = false;
      this.company = company;
    }
  },
  filters: {
    parseArray: function (value) {
      if (!value) return ''
      parseInt(value)
      value = value.split(',');
      return value
    }
  },
  computed: {
    dynamicSize() {
      return [this.iconSize, this.iconSize * 1.15];
    },
    dynamicAnchor() {
      return [this.iconSize / 2, this.iconSize * 1.15];
    }
  },
}

</script>