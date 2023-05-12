<template>
  <section class="page-contents">
    <div class="banner-page">
      <img
        :src="app_url + '/images/banner/banner-current-projects.jpg'"
        class="d-block"
        alt="Banner Current Projects"
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
        <li>All Current Projects</li>
      </ol>
    </div>
    <div class="py-5 mt-3 mb-10 text-center" data-aos="fade-up">
      <span class="underline-header text-uppercase">Current Projects</span>
    </div>
    <v-container class="card-articlr-projects">
      <v-row>
        <v-col
          cols="12"
          sm="6"
          md="4"
          lg="3"
          class="pa-3"
          v-for="item in items"
          :key="item.id"
          data-aos="fade-up"
        >
          <router-link :to="{ params: { id: item.id }, name: 'Single-current-project' }">
            <v-card class="mx-auto card-content" max-width="100%">
              <v-img
                class="align-end text-black text-animetion"
                :src="app_url+item.img"
                height="400px"
                cover
              >
                <v-card-text class="ma-5 bg-text"> <strong> {{ item.content }} </strong></v-card-text>
              </v-img>
            </v-card>
          </router-link>
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
        id: 1,
        content: "โครงการก่อสร้างอาคารสำนักงาน ธนาคารออมสินสาขาสุโขทัย",
        img: "/images/images-current-project/img (3).jpg",
      },
      {
        id: 2,
        content: "โครงการก่อสร้างอาคารเรียนรวม และเอนกประสงค์ แม่สอด ",
        img: "/images/images-current-project/img (3).png",
      },
      {
        id: 3,
        content: "โครงการก่อสร้างอาคารผู้โดยสารขาออกท่าอากาศยานนานาชาติ จ.ภูเก็ต",
        img: "/images/images-current-project/img (1).jpg",
      },
      {
        id: 4,
        content: "โครงการก่อสร้างอาคารนวัตกรรมศึกษา",
        img: "/images/images-current-project/img (2).png",
      },
      {
        id: 5,
        content: "โครงการก่อสร้างสำนักงานคดีปกครองเชียงใหม่",
        img: "/images/images-current-project/img (1).png",
      },
      {
        id: 6,
        content: "โครงการก่อสร้างอาคารสำนักงานคุมประพฤติ พร้อมสิ่งก่อสร้างประกอบ",
        img: "/images/images-current-project/img (2).jpg",
      },
      {
        id: 7,
        content: "โครงการก่อสร้างโรงเรียนหนองอาบช้าง",
        img: "/images/images-current-project/img (4).png",
      },
      {
        id: 8,
        content: "โครงการก่อสร้างอาคารพัฒนาสมองร่างกาย และพฤติกรรมของเด็กด้อยโอกาส",
        img: "/images/images-current-project/img (1).png",
      },
    ],
  }),
};
</script>
