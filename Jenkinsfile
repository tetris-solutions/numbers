pipeline {
  agent any
  environment {
    production_env = credentials('production.env')
    homolog_env = credentials('homolog.env')
  }
  stages {
    stage('Provision') {
      steps {
        script {
          if (env.TETRIS_ENV == 'homolog') {
            sh "cp ${env.homolog_env} .env"
          } else {
            sh "cp ${env.production_env} .env"
          }
        }

        sh 'chmod 644 .env'
      }
    }
    stage('Install') {
      steps {
        sh 'composer install'
      }
    }
    stage('Test') {
      steps {
        echo 'Testing... jk'
      }
    }
    stage ('Archive') {
      steps {
        sh "tar -zcf build.${env.BUILD_NUMBER}.tar.gz .env composer.json composer.lock bin config public src vendor"
        archive "build.${env.BUILD_NUMBER}.tar.gz"
      }
    }
    stage('Deploy HOMOLOG') {
      when { environment name: 'DEPLOY_TO', value: 'homolog' }
      environment {
        htdocs = "/var/www/numbers"
      }
      steps {
        sh "mkdir -p ${env.htdocs}/${env.BUILD_NUMBER}"
        sh "tar -zxf build.${env.BUILD_NUMBER}.tar.gz -C ${env.htdocs}/${env.BUILD_NUMBER}"
        sh "rm -f ${env.htdocs}/public"
        sh "ln -s ${env.htdocs}/${env.BUILD_NUMBER}/public ${env.htdocs}/public"
      }
    }
  }
  post {
    failure {
      slackSend channel: '#ops',
        color: 'RED',
        message: "Oops! ${currentBuild.fullDisplayName} failed to build for ${env.TETRIS_ENV}: ${env.BUILD_URL}"
    }
    success {
      slackSend channel: '#ops',
        color: 'good',
        message: "THIS JUST IN... ${currentBuild.fullDisplayName} built for ${env.TETRIS_ENV}, deployed to ${env.DEPLOY_TO}: ${env.BUILD_URL}"
    }
    always {
      echo 'The End'
      deleteDir()
    }
  }
}
