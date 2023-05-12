<template>
  <section class="page-contents">
    <div class="banner-page">
      <img
        :src="app_url + '/images/banner/banner-news-and-activities.png'"
        class="d-block"
        alt="Banner News & Activities"
        cover
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
        <li>News and activities</li>
      </ol>
    </div>
    <div class="py-5 mt-3 text-center" data-aos="fade-up">
      <span class="underline-header text-uppercase">News and activities</span>
    </div>
    <v-container class="card-article-news-and-activities">
      <v-row class="my-5">
        <v-col cols="12" sm="6" md="3" lg="3" v-for="item in items" :key="item.id" data-aos="fade-up">
          <router-link
            :to="{ params: { id: item.id }, name: 'News-and-activities-read' }"
          >
            <v-card class="mx-auto shadow" height="100%" max-width="100%">
              <div class="class-image">
                <v-img height="300" :src="app_url + item.img" cover />
              </div>
              <v-card-text class="txt-content">
                {{ item.content }}
              </v-card-text>
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
    // selectedItem: 0,
    items: [
      {
        id: 1,
        content: "TEAM BUILDING 2020",
        img: "/images/images-news-and-activities/img1.jpg",
      },
      {
        id: 2,
        content: "WE ARE THE HIGHLY EFFECTIVE TEAM",
        img: "/images/images-news-and-activities/img2.jpg",
      },
      {
        id: 3,
        content: "Cotto Futsal Cup ครั้งที่ 3",
        img: "/images/images-news-and-activities/img3.jpg",
      },
      {
        id: 4,
        content: "Cotto Futsal Cup ครั้งที่ 2",
        img: "/images/images-news-and-activities/img4.jpg",
      },
      {
        id: 5,
        content: "งานประชุม  งานสังสรรค์ ปีใหม่ 2558",
        img: "/images/images-news-and-activities/img5.jpg",
      },
      {
        id: 6,
        content: "Cotto Futsal Cup ครั้งที่ 1",
        img: "/images/images-news-and-activities/img6.jpg",
      },
      {
        id: 7,
        content: "ปฐมนิเทศพนักงานใหม่ วันที่12 ต.ค55",
        img: "/images/images-news-and-activities/img7.jpg",
      },
      {
        id: 8,
        content: "ต้อนรับบริษัท Tanglin สิงคโปร์ 9-12 สิงหา",
        img: "/images/images-news-and-activities/img8.jpg",
      },
      {
        id: 9,
        content: "งานเลี้ยงขอบคุณทีมงาน ปิดไซต์ โครงสร้างหลัก อาคารเรียนรวม มรภ.กพ",
        img: "/images/images-news-and-activities/img9.jpg",
      },
      {
        id: 10,
        content: "ดูงานที่บริษัท ไมโครไบโอเทค",
        img: "/images/images-news-and-activities/img10.jpg",
      },
    ],
  }),
};
</script>
