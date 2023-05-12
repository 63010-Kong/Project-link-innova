import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(process.env.APP_PATH),
  routes: [
    {
      path: '/Login-admin',
      name: 'Login-admin',
      component: () => import('@/js/pages/Login-admin'),
      meta: {
        title: 'ล็อกอินแอดมิน',
      }
    },
    {
      path: '/Login-link',
      name: 'Login-link',
      component: () => import('@/js/pages/Login-link'),
      meta: {
        title: 'ล็อกอินแอดมิน',
      }
    },
    {
      path: '/Check-mail',
      name: 'Check-mail',
      component: () => import('@/js/pages/Check-mail'),
      meta: {
        title: 'ล็อกอินแอดมิน',
      }
    },
    {
      path: '/',
      name: 'Home',
      component: () => import('@/js/pages/Home'),
      meta: {
        title: 'หน้าหลัก',
      }
    },
    {
      path: '/Test',
      name: 'Test',
      component: () => import('@/js/pages/Test'),
      meta: {
        title: 'ทดสอบ',
      }
    },
    {
      path: '/News-and-activities',
      name: 'News-and-activities',
      component: () => import('@/js/pages/News-and-activities'),
      meta: {
        title: 'ข่าวสารและกิจกรรม',
      }
    },
    {
      path: '/News-and-activities-read/:id',
      name: 'News-and-activities-read',
      component: () => import('@/js/pages/inpage/News-and-activities-read'),
      meta: {
        title: 'ข่าวสารหรือกิจกรรมตาม ID',
      },
      props:true
    },
    {
      path: '/Current-projects',
      name: 'Current-projects',
      component: () => import('@/js/pages/Current-projects'),
      meta: {
        title: 'โครงการปัจจุบัน',
      }
    },
    {
      path: '/Single-current-project/:id',
      name: 'Single-current-project',
      component: () => import('@/js/pages/inpage/Single-current-project'),
      meta: {
        title: 'โครงการปัจจุบันตาม ID',
      },
      props:true
    },
    {
      path: '/Completed-projects',
      name: 'Completed-projects',
      component: () => import('@/js/pages/Completed-projects'),
      meta: {
        title: 'โครงการสิ้นสุด',
      }
    },
    {
      path: '/Single-completed-project/:id',
      name: 'Single-completed-project',
      component: () => import('@/js/pages/inpage/Single-completed-project'),
      meta: {
        title: 'โครงการสิ้นสุดตาม ID',
      },
      props:true
    },
    {
      path: '/Our-partner',
      name: 'Our-partner',
      component: () => import('@/js/pages/Our-partner'),
      meta: {
        title: 'พันธมิตร',
      }
    },
    {
      path: '/Join-us',
      name: 'Join-us',
      component: () => import('@/js/pages/Join-us'),
      meta: {
        title: 'เข้าร่วมกับเรา',
      }
    },
    {
      path: '/Details-join-us/:id',
      name: 'Details-join-us',
      component: () => import('@/js/pages/inpage/Details-join-us'),
      meta: {
        title: 'เข้าร่วมกับเราตามแผนก',
      },
      props:true
    },
    {
      path: '/Contact-us',
      name: 'Contact-us',
      component: () => import('@/js/pages/Contact-us'),
      meta: {
        title: 'ช่องทางการติดต่อ',
      }
    },
    {
      path: '/Dashboard',
      name: 'Dashboard',
      component: () => import('@/js/backend/Dashboard'),
      meta: {
        title: 'ช่องทางการติดต่อ',
      }
    },
    {
      path: '/News-and-activitie-end',
      name: 'News-and-activitie-end',
      component: () => import('@/js/backend/News-and-activitie-end'),
      meta: {
        title: 'ช่องทางการติดต่อ',
      }
    },
    {
      path: '/Current-projects-end',
      name: 'Current-projects-end',
      component: () => import('@/js/backend/Current-projects-end'),
      meta: {
        title: 'ช่องทางการติดต่อ',
      }
    },
    {
      path: '/Completed-projects-end',
      name: 'Completed-projects-end',
      component: () => import('@/js/backend/Completed-projects-end'),
      meta: {
        title: 'ช่องทางการติดต่อ',
      }
    },
    {
      path: '/Join-us-end',
      name: 'Join-us-end',
      component: () => import('@/js/backend/Join-us-end'),
      meta: {
        title: 'ช่องทางการติดต่อ',
      }
    },
    {
      path: '/Our-partner-end',
      name: 'Our-partner-end',
      component: () => import('@/js/backend/Our-partner-end'),
      meta: {
        title: 'ช่องทางการติดต่อ',
      }
    },
  ],
  scrollBehavior () {
    window.scrollTo(0,0);
  }
})

router.beforeEach((to, from, next) => {
  next();
});


export default router;