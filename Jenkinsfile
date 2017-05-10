pipeline {
  agent any
  environment {
    htdocs = "/var/www/numbers"
    production_env = credentials('production.env')
    homolog_env = credentials('homolog.env')
    ssh_key = credentials('tetris.pem')
    analytics_google_client = credentials('analytics-google-client.json')
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

        sh "cp ${env.analytics_google_client} analytics-google-client.json"
        sh 'chmod 644 .env *-google-client.json'
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
        sh "tar -zcf build.${env.BUILD_NUMBER}.tar.gz .env *-google-client.json composer.json composer.lock bin config public src maps vendor"
        archive "build.${env.BUILD_NUMBER}.tar.gz"
      }
    }
    stage('Deploy') {
      steps {
        sh "cp ${env.ssh_key} tetris.pem"
        sh "chmod 600 tetris.pem"
        sh "scp -i tetris.pem -o StrictHostKeyChecking=no build.${env.BUILD_NUMBER}.tar.gz ubuntu@${env.DEPLOY_TO}:."
        sh "ssh -i tetris.pem -o StrictHostKeyChecking=no -t ubuntu@${env.DEPLOY_TO} 'mkdir -p ${env.htdocs}/${env.BUILD_NUMBER}'"
        sh "ssh -i tetris.pem -o StrictHostKeyChecking=no -t ubuntu@${env.DEPLOY_TO} 'tar -zxf build.${env.BUILD_NUMBER}.tar.gz -C ${env.htdocs}/${env.BUILD_NUMBER}'"
        sh "ssh -i tetris.pem -o StrictHostKeyChecking=no -t ubuntu@${env.DEPLOY_TO} 'rm build.${env.BUILD_NUMBER}.tar.gz'"
        sh "ssh -i tetris.pem -o StrictHostKeyChecking=no -t ubuntu@${env.DEPLOY_TO} 'rm -f ${env.htdocs}/public'"
        sh "ssh -i tetris.pem -o StrictHostKeyChecking=no -t ubuntu@${env.DEPLOY_TO} 'ln -s ${env.htdocs}/${env.BUILD_NUMBER}/public ${env.htdocs}/public'"
        sh "ssh -i tetris.pem -o StrictHostKeyChecking=no -t ubuntu@${env.DEPLOY_TO} 'sudo systemctl reload php7.0-fpm.service'"
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
