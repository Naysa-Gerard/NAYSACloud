<template>
    <div class="candidates-container">
        <div class="container py-3">
            <h2 class="text-light text-center">Candidates</h2>
            <div>
                <h3 class="text-light ms-3 mt-5 mb-3">President</h3>
                <div class="row m-0">
                    <div class="card col-12 col-md-6 col-lg-3 mt-0 m-1">
                        <CandidateCard>
                            <a :href="'/'" class="btn btn-primary mt-3 w-100">View</a>
                        </CandidateCard>
                    </div>
                </div>
                <h3 class="text-light ms-3 mt-5 mb-3">Vice President</h3>
                <div class="row m-0">
                    <div class="card col-12 col-md-6 col-lg-3 mt-0 m-1">
                        <CandidateCard>
                            <a :href="`/`" class="btn btn-primary mt-3 w-100">View</a>
                        </CandidateCard>
                    </div>
                </div>
                <h3 class="text-light ms-3 mt-5 mb-3">Secretary</h3>
                <div class="row m-0">
                    <div class="card col-12 col-md-6 col-lg-3 mt-0 m-1">
                        <CandidateCard>
                            <a :href="'/'" class="btn btn-primary mt-3 w-100">View</a>
                        </CandidateCard>
                    </div>
                </div>
                <h3 class="text-light ms-3 mt-5 mb-3">Treasurer</h3>
                <div class="row m-0">
                    <div class="card col-12 col-md-6 col-lg-3 mt-0 m-1">
                        <CandidateCard>
                            <a :href="`/candidates/${candidate.id}`" class="btn btn-primary mt-3 w-100">View</a>
                        </CandidateCard>
                    </div>
                </div>
                <h3 class="text-light ms-3 mt-5 mb-3">Auditor</h3>
                <div class="row m-0">
                    <div class="card col-12 col-md-6 col-lg-3 mt-0 m-1">
                        <CandidateCard>
                            <a :href="`/`" class="btn btn-primary mt-3 w-100">View</a>
                        </CandidateCard>
                    </div>
                </div>
                <h3 class="text-light ms-3 mt-5 mb-3">Public Officer</h3>
                <div class="row m-0">
                    <div class="card col-12 col-md-6 col-lg-3 mt-0 mb-3 m-1">
                        <CandidateCard>
                            <a :href="`/`" class="btn btn-primary mt-3 w-100">View</a>
                        </CandidateCard>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-center text-light mt-5">No candidates found.</h3>
            </div>
        </div>
    </div>
</template>
<script>
import CandidateCard from '@/components/CandidateCard.vue'

export default {
    name: 'Candidates',
    data(){
        return {
            candidates: [],
        }
    },
    components: {
        CandidateCard
    },
    computed: {
        filterPresident() {
            return this.candidates.filter((candidate) => candidate.position === 'President')
        },
        filterVicePresident() {
            return this.candidates.filter((candidate) => candidate.position === 'Vice President')
        },
        filterSecretary() {
            return this.candidates.filter((candidate) => candidate.position === 'Secretary')
        },
        filterTreasurer() {
            return this.candidates.filter((candidate) => candidate.position === 'Treasurer')
        },
        filterAuditor() {
            return this.candidates.filter((candidate) => candidate.position === 'Auditor')
        },
        filterPublicOfficer() {
            return this.candidates.filter((candidate) => candidate.position === 'Public Officer')
        },
    },
    methods: {
        async getCandidates(){
            await axios.get('/api/candidates/')
            .then((response) => {
                this.candidates = response.data.candidates
            })
            .catch(error => console.log(error))
        }
    },
    created(){
        this.getCandidates()
    }
}
</script>
<style scoped>
    .candidates-container {
        min-height: 100vh;
    }

    .card{
        color: #194F90;
        font-weight: bold;
        font-family: 'Pathway Extreme', sans-serif;
    }
    .btn{ 
        font-size: 14pt;
        height: 36px;
        color: #ffffff;
        background: #194F90;
        margin: auto;
        text-align: center;
        font-family: 'Pathway Extreme', sans-serif;
    }

    h2, h3{
        font-family: 'Pathway Extreme', sans-serif;
        font-weight: 600;
    }
</style>