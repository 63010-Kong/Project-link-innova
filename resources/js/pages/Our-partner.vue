<template>
  <section class="page-contents">
    <div class="banner-page">
      <img
        :src="app_url + '/images/banner/banner-our-partner.png'"
        class="d-block"
        alt="Banner Contact Us"
      />
    </div>
    <div class="header-page">
      <ol>
        <li>
          <router-link to="/"><strong>Home</strong></router-link>
        </li>
        <li>
          <v-icon>mdi-chevron-right</v-icon>
        </li>
        <li>Our partner</li>
      </ol>
    </div>
    <div class="py-5 mt-3 mb-10 text-center" data-aos="fade-up">
      <span class="underline-header text-uppercase">Our partner</span>
    </div>
    <v-container class="content-op my-10">
      <v-row>
        <v-col cols="12" sm="6" md="4" lg="3" v-for="(item, index) in items" :key="index" data-aos="fade-up">
          <a :href="item.url" target="_blank" class="text-decoration-none text-dark">
            <v-card class="card-op mx-auto">
              <v-img class="align-end text-black text-animetion" :src="app_url + item.img" contain>
                <v-card-text class="mb-2 bg-text"><strong> {{ item.content }} </strong></v-card-text>
              </v-img>
            </v-card>
          </a>
        </v-col>
      </v-row>
    </v-container>
  </section>
</template>
<script>
export default {
  data: () => ({
    selectedItem: 0,
    items: [
      {
        content: "บริษัท ปูนซิเมนต์ไทย จำกัด",
        img: "/images/images-our-partner/our-partner1.jpg",
        url: "https://web.cpac.co.th/",
      },
      {
        content: "บริษัท ผลิตภัณฑ์และวัตถุก่อสร้าง จำกัด",
        img: "/images/images-our-partner/our-partner2.jpg",
        url: "https://www.scgbuildingmaterials.com/",
      },
      {
        content: "บริษัท เชียงใหม่วีระวิศวการ จำกัด",
        img: "/images/images-our-partner/our-partner3.png",
        url: "https://www.weerawissawakarn.com/",
      },
      {
        content: "บริษัท ฮิตาชิ มหาชนจำกัด",
        img: "/images/images-our-partner/our-partner4.png",
        url: "https://www.yellowpages.co.th/",
      },
    ],
  }),
};
</script>
