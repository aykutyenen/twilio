import {
    connect,
    createLocalTracks,
    createLocalVideoTrack,
    createLocalAudioTrack,
    LocalParticipant
} from "twilio-video";
//import { createLocalVideoTrack } from "twilio-video";

const video = document.querySelector("#local-media");
const remote_video = document.querySelector("#remote-media");

connect(video.dataset.token, {
    audio: true,
    name: video.dataset.name,
    video: true
}).then(
    room => {
        console.log(`Successfully joined a Room: ${room}`);

        room.participants.forEach(participant => {
            participant.tracks.forEach(publication => {
              if (publication.track) {
                remote_video.appendChild(track.attach());
              }
            });
          
           participant.on('trackSubscribed', track => {
            remote_video.appendChild(track.attach());
            });
          });
          

        room.on("participantConnected", participant => {
            console.log(`Participant "${participant.identity}" connected`);

            participant.tracks.forEach(publication => {
                if (publication.isSubscribed) {
                    const track = publication.track;
                    remote_video.appendChild(track.attach());
                }
            });

            participant.on("trackSubscribed", track => {
                remote_video.appendChild(track.attach());
            });
        });
    },
    error => {
        console.error(`Unable to connect to Room: ${error.message}`);
    }
);
