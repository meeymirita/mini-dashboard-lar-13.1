import { usePage } from '@inertiajs/vue3'

export default function useAuth() {
    return usePage().props.auth
}
