<template>
  <section class="page-contents">
    <div class="mx-auto opacity-banner">
      <v-img
        dark
        :src="app_url + '/images/banner/banner-news-and-activities.png'"
        class="banner-inpage align-center"
        max-height="500"
      >
        <v-row>
          <v-col class="text-center" cols="12">
            <span class="underline-header text-white">News and activities</span>
            <div class="txt-slide">
              <span>{{ post.subtitle }}</span>
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
          <router-link to="/News-and-activities"
            ><strong>ALL News and Activities</strong></router-link
          >
        </li>
        <li>
          <v-icon>mdi-chevron-right</v-icon>
        </li>
        <li>{{ post.subtitle }}</li>
      </ol>
    </div>
    <div class="single-content">
      <v-container v-if="post.video != ''" data-aos="fade-up">
        <div class="video">
          <v-row>
            <v-col cols="12" sm="12" md="12" lg="6">
              <div class="videoWrapper">
                <embed :src="post.video" type="" />
              </div>
            </v-col>
            <v-col cols="12" sm="12" md="12" lg="6" class="px-5">
              <h2>{{ post.title }}</h2>
              <h5>{{ post.subtitle }}</h5>
            </v-col>
          </v-row>
        </div>
        <v-divider class="my-2"></v-divider>
      </v-container>
      <div class="gallery">
        <v-row>
          <v-col
            cols="12"
            sm="6"
            md="4"
            lg="2"
            v-for="(item, index) in items"
            :key="index"
            class="card-content"
            data-aos="fade-up"
          >
            <v-card class="mx-auto" height="auto" max-width="100%" v-bind="props">
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
        title: "LINK INNOVA Team building at Flora Creek Chiangmai 26-28 Oct 2020",
        subtitle: "Team Building 2020 - LINKINNOVA",
        img: "/images/images-news-and-activities/img1.jpg",
        video: "https://www.youtube.com/embed/BI-ui-xfdns",
      },
      {
        id: 2,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "WE ARE THE HIGHLY EFFECTIVE TEAM",
        img: "/images/images-news-and-activities/img2.jpg",
        video: "https://www.youtube.com/embed/4ML8VJI6Zo8",
      },
      {
        id: 3,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "Cotto Futsal Cup ครั้งที่ 3",
        img: "/images/images-news-and-activities/img3.jpg",
        video: "",
      },
      {
        id: 4,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "Cotto Futsal Cup ครั้งที่ 2",
        img: "/images/images-news-and-activities/img4.jpg",
        video: "https://www.youtube.com/embed/4ML8VJI6Zo8",
      },
      {
        id: 5,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "งานประชุม  งานสังสรรค์ ปีใหม่ 2558",
        img: "/images/images-news-and-activities/img5.jpg",
        video: "",
      },
      {
        id: 6,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "Cotto Futsal Cup ครั้งที่ 1",
        img: "/images/images-news-and-activities/img6.jpg",
        video: "https://www.youtube.com/embed/4ML8VJI6Zo8",
      },
      {
        id: 7,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "ปฐมนิเทศพนักงานใหม่ วันที่12 ต.ค55",
        img: "/images/images-news-and-activities/img7.jpg",
        video: "https://www.youtube.com/embed/4ML8VJI6Zo8",
      },
      {
        id: 8,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "ต้อนรับบริษัท Tanglin สิงคโปร์ 9-12 สิงหา",
        img: "/images/images-news-and-activities/img8.jpg",
        video: "https://www.youtube.com/embed/4ML8VJI6Zo8",
      },
      {
        id: 9,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "งานเลี้ยงขอบคุณทีมงาน ปิดไซต์ โครงสร้างหลัก อาคารเรียนรวม มรภ.กพ",
        img: "/images/images-news-and-activities/img9.jpg",
        video: "",
      },
      {
        id: 10,
        title: "LINK อาคารบูรณาการ ๗ ชั้น โรงพยาบาลหลังสวน , จังหวัดชุมพร , มกราคม ๒๕๖๔",
        subtitle: "ดูงานที่บริษัท ไมโครไบโอเทค",
        img: "/images/images-news-and-activities/img10.jpg",
        video: "",
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
