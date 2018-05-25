<template>
    <div>
        <div>
            <table class="w-full">
                <thead class="bg-blue-dark">
                    <tr>
                        <th class="w-1/4 text-white whitespace-no-wrap p-2 border-r border-blue-lighter">
                            Вид отдыха
                        </th>
                        <th class="w-1/8 text-white whitespace-no-wrap p-2 border-r border-blue-lighter">
                            Описание
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="activity in activities" :key="activity.id" class="border-b border-blue-lighter">
                        <td class="p-2 border-r border-blue-lighter">
                            <div v-text="activity.name" class="mb-1"></div>
                        </td>
                        <td v-text="activity.pivot.description" class="p-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            activities: {
                type: Array,
                requried: true
            }
        }
    }
</script>
