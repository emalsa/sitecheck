<script>
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import {Link, useForm} from '@inertiajs/inertia-vue3';
import BreezeButton from '@/Components/BreezeInput/Button.vue';
import BreezeInput from '@/Components/BreezeInput/Input.vue'
import BreezeLabel from '@/Components/BreezeInput/Label.vue'
import BreezeCheckbox from '@/Components/BreezeInput/Checkbox.vue'

export default {
  components: {
    BreezeGuestLayout,
    BreezeInput,
    BreezeCheckbox,
    BreezeLabel,
    BreezeButton,
    useForm,
    Link
  },
  props: {
    canResetPassword: Boolean,
    status: Boolean
  },
  setup() {
    const form = useForm({
      email: '',
      password: '',
      remember: false
    });

    return {form}
  },
  methods: {
    submit() {
      this.form.post(route('login'), {
        onFinish: () => this.form.reset('password'),
      });
    },
  },
}

// defineProps({
//   canResetPassword: Boolean,
//   status: String,
// });
//
// const form = useForm({
//   email: '',
//   password: '',
//   remember: false
// });
//
// const submit = () => {
//   alert(1)
//   form.post(route('login'), {
//     onFinish: () => form.reset('password'),
//   });
// };
</script>

<template>
  <BreezeGuestLayout>
    <Head title="Log in IN"/>

    <BreezeValidationErrors class="mb-4"/>

    <div class="flex items-center justify-center h-screen px-6 bg-gray-200">
      <div class="w-full max-w-sm p-6 bg-white rounded-md shadow-md">
        <div class="flex items-center justify-center">
          <svg></svg>
          <span class="text-2xl font-semibold text-gray-700"></span>
        </div>

        <form class="mt-4" @submit.prevent="submit">
          <div>
            <BreezeLabel for="email" value="Email" />
            <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
          </div>

          <div class="mt-4">
            <BreezeLabel for="password" value="Password" />
            <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
          </div>

          <div class="block mt-4">
            <label class="flex items-center">
              <BreezeCheckbox name="remember" v-model:checked="form.remember" />
              <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
          </div>

          <div class="flex items-center justify-end mt-4">
            <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
              Forgot your password?
            </Link>

            <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Log in
            </BreezeButton>
          </div>
        </form>
      </div>
    </div>
  </BreezeGuestLayout>
</template>
