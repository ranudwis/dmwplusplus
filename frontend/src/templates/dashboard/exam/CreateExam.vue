<template>
    <small-dialog
        v-model="dialog"
        @ok="create"
        title="Buat ujian"
        okButton="buat"
        loading="exam"
    >
        <template #activator="{ on }">
            <div class="text-right">
                <v-btn v-on="on" fab color="primary">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </div>
        </template>

        <v-overflow-btn
            v-model="type"
            :items="types"
            label="Tipe ujian"
        ></v-overflow-btn>

        <v-overflow-btn
            v-model="semester"
            :items="semesters"
            label="Semester"
        ></v-overflow-btn>

        <v-overflow-btn
            v-model="schoolYear"
            :items="schoolYears"
            label="Tahun ajaran"
        >
        </v-overflow-btn>
    </small-dialog>
</template>

<script>
import api from '@/api'
import alert from '@/dmw/alert'
import moment from 'moment'
import SmallDialog from '@/templates/dialog/SmallDialog'

export default {
    components: {
        SmallDialog,
    },

    data() {
        return {
            dialog: false,
            types: [
                { text: 'Tengah semester', value: '0' },
                { text: 'Akhir semester', value: '1' },
            ],
            semesters: [
                { text: 'Semester Ganjil', value: '0' },
                { text: 'Semester Genap', value: '1' },
            ],

            type: null,
            semester: null,
            schoolYear: null,
        }
    },

    computed: {
        schoolYears() {
            const currentYear = moment().year()
            const schoolYear = []

            for (let year = currentYear; year >= currentYear - 10; year--) {
                schoolYear.push({
                    value: [year, year + 1],
                    text: `${year}/${year + 1}`
                })
            }

            return schoolYear
        }
    },

    methods: {
        create() {
            api.post('exam', {
                type: this.type,
                semester: this.semester,
                startYear: this.schoolYear[0],
                endYear: this.schoolYear[1],
            }, { loader: 'exam' })
                .then(response => {
                    if (response.data.created) {
                        alert.success('exam.created')

                        this.$emit('created')
                        this.dialog = false
                    }
                })
        }
    }
}
</script>
