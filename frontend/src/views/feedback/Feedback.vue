<template>
    <v-main>
        <v-container class="mt-12">
            <div class="display-1 text-center font-weight-light">Buat DMW++ menjadi lebih baik!</div>
            <div class="subtitle text-center">
                Bug, Ide, Fitur Baru, atau Kolaborasi
            </div>

            <v-row class="mt-12 align-center justify-space-around">
                <v-col cols="12" sm="5">
                    <v-text-field label="Nama" autofocus></v-text-field>

                    <v-text-field label="ID Line"></v-text-field>

                    <v-textarea rows="3" auto-grow label="Feedback"></v-textarea>

                    <v-btn color="primary">kirim</v-btn>
                </v-col>

                <v-col cols="12" sm="1" align-self="stretch">
                    <v-divider :vertical="$vuetify.breakpoint.smAndUp"></v-divider>
                </v-col>

                <v-col cols="12" sm="5">
                    <v-card href="https://github.com/ranudwis/dmwplusplus/issues" target="_blank">
                        <v-card-text class="text-center">
                            <v-icon size="128" color="#24292E">mdi-github</v-icon>
                        </v-card-text>

                        <v-card-title class="justify-center">
                            ranudwis/dmwplusplus
                        </v-card-title>

                        <v-card-subtitle class="text-center">
                            Juga menerima pull request
                        </v-card-subtitle>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>
