<template>
  <section class="page-contents">
    <div class="mx-auto opacity-banner">
      <v-img
        dark
        :src="app_url + '/images/banner/banner-current-projects.jpg'"
        class="banner-inpage align-center"
        max-height="500"
      >
        <v-row>
          <v-col class="text-center" cols="12">
            <span class="underline-header text-white">Current project</span>
            <div class="txt-slide">
              <span>{{ post.content }}</span>
            </div>
          </v-col>
        </v-row>
      </v-img>
    </div>
    <div class="header-page">
      <ol>
        <li>
          <router-link to="/"><strong>Home</strong></router-link>
        </li>
        <li>
          <v-icon>mdi-chevron-right</v-icon>
        </li>
        <li>
          <router-link to="/Current-projects"
            ><strong>ALL Current Projects</strong></router-link
          >
        </li>
        <li>
          <v-icon>mdi-chevron-right</v-icon>
        </li>
        <li>{{ post.content }}</li>
      </ol>
    </div>
    <div class="single-content">
      <div class="gallery">
        <v-row>
          <v-col
            cols="12"
            sm="6"
            md="3"
            lg="2"
            v-for="(item, index) in items"
            :key="index"
            class="card-content"
            data-aos="fade-up"
          >
            <v-card class="mx-auto" height="100%" max-width="100%" v-bind="props">
              <div class="class-image">
                <v-img height="200" :src="app_url + item.img" cover />
              </div>
            </v-card>
          </v-col>
        </v-row>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  props: {
    id: {
      require: true,
      type: Number,
      default: false,
    },
  },
  data: () => ({
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
  computed: {
    post() {
      return this.items.find((post) => post.id === Number(this.id));
    },
  },
};
</script>
