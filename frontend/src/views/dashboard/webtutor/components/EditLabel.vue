<template>
    <small-dialog
        v-model="dialog"
        @ok="save"
        title="Edit Label"
        okButton="edit"
        loading="label"
    >
        <template #activator="{ on }">
            <v-btn v-on="on" icon>
                <v-icon>mdi-pencil</v-icon>
            </v-btn>
        </template>

        <v-text-field v-model="labelName" autofocus label="Nama Label"></v-text-field>
        <v-text-field v-model="labelSlug" label="Nama Singkat"></v-text-field>
    </small-dialog>
</template>

<script>
import { kebabCase } from 'lodash'
import api from '@/api'
import alert from '@/dmw/alert'
import SmallDialog from '@/templates/dialog/SmallDialog'

export default {
    components: {
        SmallDialog,
    },

    props: {
        label: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            dialog: false,
            labelName: null,
            labelSlug: null,
        }
    },

    watch: {
        labelName(to) {
            this.labelSlug = kebabCase(to)
        }
    },

    methods: {
        save() {
            api.patch(`label/${this.label.id}`, {
                    name: this.labelName,
                    slug: this.labelSlug,
                }, { loader: 'label' })
                .then(() => {
                    alert.success('label.edited')

                    this.$emit('edited')
                    this.reset()
                })
        },

        reset() {
            this.dialog = false
            this.labelName = null
            this.labelSlug = null
        },
    },

    created() {
        this.labelName = this.label.name
        this.labelSlug = this.label.slug
    }
}
</script>
