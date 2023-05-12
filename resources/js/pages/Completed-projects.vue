<template>
  <section class="page-contents">
    <div class="banner-page">
      <img
        :src="app_url + '/images/banner/banner-completed-projects.jpg'"
        class="d-block"
        alt="Banner Completed Projects"
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
        <li>All Completed Projects</li>
      </ol>
    </div>
    <div class="py-5 mt-3 text-center" data-aos="fade-up">
      <span class="underline-header text-uppercase">Completed Projects</span>
    </div>
    <div class="pagination-year">
      <ul>
        <li><v-btn variant="text"><i class="fa-solid fa-angle-left"></i></v-btn></li>
        <li><v-btn variant="outlined" class="active-button"><strong>All</strong></v-btn></li>
        <li v-for="(item,index) in years" :key="index"><v-btn variant="outlined"><strong>{{ item }}</strong></v-btn></li>
        <li><v-btn variant="text"><i class="fa-solid fa-angle-right"></i></v-btn></li>
      </ul>
    </div>
    <v-container class="card-articlr-projects">
      <v-row class="my-5">
        <v-col
          cols="12"
          sm="6"
          md="4"
          lg="3"
          class="pa-3"
          v-for="item in items"
          :key="app_url+item.id"
          data-aos="fade-up"
        >
          <router-link
            :to="{ params: { id: item.id }, name: 'Single-completed-project' }"
          >
            <v-card class="mx-auto card-content" max-width="100%">
              <v-img
                class="align-end text-black text-animetion"
                :src="app_url + item.img"
                height="400px"
                cover
              >
                <v-card-text class="ma-5 bg-text"><strong> {{ item.content }} </strong></v-card-text>
              </v-img>
            </v-card>
          </router-link>
        </v-col>
      </v-row>
      <div class="pagination-year">
        <v-pagination
          :start="1"
          :length="10"
          :total-visible="7"
        ></v-pagination>
      </div>
    </v-container>
  </section>
</template>
<script>
export default {
  data: () => ({
    page: 1,
    selectedItem: 0,
    years:['2557','2558','2559','2560','2560','2561','2562','2563','2564','2565'],
    pages:['1','2','3','4','5'],
    items: [
      {
        id: 1,
        content:
          "โครงการก่อสร้างอาคารอำนวยการผู้ป่วยนอก และอุบัติเหตุฉุกเฉิน 11 ชั้น โรงพยาบาลราชบุรี",
        img: "/images/images-completed-project/img (1).png",
      },
      {
        id: 2,
        content: "โครงการก่อสร้างท่าอากาศยานเบตง",
        img: "/images/images-completed-project/img (2).png",
      },
      {
        id: 3,
        content: "โครงก่อสร้างคอนโด Hiltania",
        img: "/images/images-completed-project/img (3).png",
      },
      {
        id: 4,
        content: "โครงก่อสร้างบ้านพักศาลปกครองเชียงใหม่",
        img: "/images/images-completed-project/img (4).png",
      },
      {
        id: 5,
        content: "โครงก่อสร้างอาคารเรียนและปฏิบัติการรวม คณะมนุษยศาสตร์",
        img: "/images/images-completed-project/img (5).png",
      },
      {
        id: 6,
        content: "โครงก่อสร้างอาคารที่ทำการศาล จังหวัดกระบี่",
        img: "/images/images-completed-project/img (6).png",
      },
    ],
  }),
};
</script>
