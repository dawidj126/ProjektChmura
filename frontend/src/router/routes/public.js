export default [
  {
    path: '/',
    name: 'home',
    component: () => import('@/views/public/HomeView.vue'),
  },
  {
    path: '/oferty',
    name: 'properties',
    component: () => import('@/views/public/PropertyListView.vue'),
  },
  {
    path: '/oferty/:slug',
    name: 'property-detail',
    component: () => import('@/views/public/PropertyDetailView.vue'),
  },
  {
    path: '/blog',
    name: 'blog',
    component: () => import('@/views/public/BlogListView.vue'),
  },
  {
    path: '/blog/:slug',
    name: 'blog-post',
    component: () => import('@/views/public/BlogPostView.vue'),
  },
  {
    path: '/:slug(o-nas|jak-to-dziala|kontakt|faq|regulamin|polityka-prywatnosci)',
    name: 'page',
    component: () => import('@/views/public/PageView.vue'),
  },
]
