<template>
  <section class="page-contents">
    <div class="banner-page">
      <img
        :src="app_url + '/images/banner/banner-contact-us.jpg'"
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
        <li>Contact us</li>
      </ol>
    </div>
    <div class="py-5 mt-3 mb-10 text-center" data-aos="fade-up">
      <span class="underline-header text-uppercase">Contact us</span>
    </div>
    <!-- Parallax md down -->
    <div class="bg-parallax-contant" data-aos="fade-up">
      <v-parallax :src="app_url + '/images/images-background/bg-parallax.jpg'">
        <v-row class="bg-text">
          <v-col class="txt-end px-10" cols="12" sm="12" md="5">
            <h1 data-aos="fade-up">Social Media</h1>
            <h4 data-aos="fade-up">
              <i class="fa-brands fa-facebook"> </i>
              <a
                href="https://www.facebook.com/Link.Innova.Properties.Co.LTD"
                target="_blank"
                >Link Innova Properties Co., LTD</a
              >
            </h4>
            <h4 data-aos="fade-up">
              <i class="fa-brands fa-youtube"></i>
              <a href="https://www.youtube.com/@linkinnova3915" target="_blank"
                >LINK INNOVA(@linkinnova3915)</a
              >
            </h4>
          </v-col>
          <v-divider
            :thickness="2"
            class="border-opacity-100 hidden-sm-and-down"
            color="whige"
            vertical
            data-aos="fade-up"
          ></v-divider>
          <v-divider
            :thickness="2"
            class="border-opacity-100 hidden-md-and-up"
            color="whige"
            data-aos="fade-up"
          ></v-divider>
          <v-col class="pt-5 px-10" cols="12" sm="12" md="6">
            <h4 data-aos="fade-up">
              <i class="fa-regular fa-phone-volume"></i>
              053-039191
            </h4>
            <h4 data-aos="fade-up">
              <i class="fa-regular fa-fax"></i>
              053-039190 (แฟกซ์)
            </h4>
            <h4 data-aos="fade-up">
              <i class="fa-regular fa-envelope"></i>
              link.innova@link.co.th
            </h4>
            <h4 data-aos="fade-up">
              <i class="fa-light fa-location-dot"></i>
              <a
                href="https://www.google.co.th/maps/place/%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%A9%E0%B8%B1%E0%B8%97+%E0%B8%A5%E0%B8%B4%E0%B8%87%E0%B8%84%E0%B9%8C+%E0%B8%AD%E0%B8%B4%E0%B8%99%E0%B9%82%E0%B8%99%E0%B8%A7%E0%B9%88%E0%B8%B2+%E0%B8%9E%E0%B8%A3%E0%B9%87%E0%B8%AD%E0%B8%9E%E0%B9%80%E0%B8%9E%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%95%E0%B8%B5%E0%B9%89+%E0%B8%88%E0%B8%B3%E0%B8%81%E0%B8%B1%E0%B8%94/@18.8544019,99.0944933,17z/data=!3m1!4b1!4m6!3m5!1s0x30da241ce2a68ea5:0xbba4a0c990755ccd!8m2!3d18.8543968!4d99.0966873!16s%2Fg%2F1td8vywq?hl=th"
                target="_blank"
              >
                50 หมู่ 2 ต.ตลาดขวัญ อำเภอดอยสะเก็ต จังหวัดเชียงใหม่ 50220</a
              >
            </h4>
          </v-col>
        </v-row>
      </v-parallax>
    </div>
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
      },
      {
        content: "บริษัท ผลิตภัณฑ์และวัตถุก่อสร้าง จำกัด",
        img: "/images/images-our-partner/our-partner2.jpg",
      },
      {
        content: "บริษัท เชียงใหม่วีระวิศวการ จำกัด",
        img: "/images/images-our-partner/our-partner3.png",
      },
      {
        content: "บริษัท ฮิตาชิ มหาชนจำกัด",
        img: "/images/images-our-partner/our-partner4.png",
      },
    ],
  }),
};
</script>
