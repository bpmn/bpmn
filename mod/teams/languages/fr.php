<?php
/**
 * Elgg teams plugin language pack
 *
 * @package Elggteams
 */

$french = array(

	/**
	 * Menu items and titles
	 */
	'teams' => "Teams",
	'teams:owner' => "Mes Teams",
	'teams:yours' => "Mes Teams",
	'teams:user' => "Les Teams de %s",
	'teams:all' => "Les Teams du site",
	'teams:new' => "Créer une nouvelle Team",
	'teams:edit' => "Modifier la Team",
	'teams:delete' => "Supprimer la Team",
	'teams:membershiprequests' => "Demandes d'adhésion à la Team",
        'teams:membershipreq_list'=>"Demandes d'adhésion à mes Teams",
	'teams:invitations' => "Invitations à joindre des Teams",

	'teams:icon' => "Icone de la Team (ne rien inscrire pour laisser inchangé)",
	'teams:name' => "Nom de la Team",
	'teams:username' => "Nom court de la Team (Qui s'affichera dans l'URL : en caractères alphanumériques)",
	'teams:description' => "Description",
	'teams:briefdescription' => "Brève description",
	'teams:interests' => "Mots-clé",
	'teams:website' => "Site web",
	'teams:members' => "Membres de la Team",
	'teams:members:title' => "Les membres de %s",
	'teams:members:more' => "Voir tous les membres",
	'teams:membership' => "Permissions d'accès à la Team",
	'teams:access' => "Permissions d'accès",
	'teams:widget:num_display' => "Nombre de Teams à afficher",
	'teams:widget:membership' => "Adhésion au groupe",
	'teams:widgets:description' => "Afficher les Teams dont vous êtes membre dans votre profil",
	'teams:noaccess' => "Vous n'avez pas accès au groupe",
	'teams:permissions:error' => "Vous n'avez pas les autorisations pour çà",
	'teams:ingroup' => "dans le groupe",
	'teams:cantedit' => "Vous ne pouvez pas modifier ce groupe",
	'teams:saved' => "Groupe enregistré",
	'teams:featured' => "Les Teams à la une",
	'teams:makeunfeatured' => "Enlever de la une",
	'teams:makefeatured' => "Mettre à la une",
	'teams:featuredon' => "%s est maintenant un groupe à la une.",
	'teams:unfeatured' => "s% a été enlevé par les Teams à la une.",
	'teams:featured_error' => "Groupe invalide.",
	'teams:joinrequest' => "Demander une adhésion au groupe",
	'teams:join' => "Rejoindre le groupe",
	'teams:leave' => "Quitter le groupe",
	'teams:invite' => "Inviter des contacts",
	'teams:invite:title' => "Invitez des amis à ce groupe",
	'teams:inviteto' => "Inviter des contacts au groupe '%s'",
	'teams:nofriends' => "Vous n'avez plus de contacts à inviter à ce groupe.",
	'teams:nofriendsatall' => "Vous n'avez pas d'amis à inviter !",
	'teams:viagroups' => "Via les Teams",
	'teams:group' => "Groupe",
	'teams:search:tags' => "Tag",
	'teams:search:title' => "Rechercher des Teams qui contiennent le tag '% s'",
	'teams:search:none' => "Aucun groupe correspondant n'a été trouvé",

	'teams:activity' => "Activité du Groupe",
	'teams:enableactivity' => "Rendre disponible Activité de groupe",
	'teams:activity:none' => "Il n'y a pas encore d'activité de groupe",

	'teams:notfound' => "Le groupe n'a pas été trouvé",
	'teams:notfound:details' => "Le groupe que vous recherchez n'existe pas, ou alors vous n'avez pas la permission d'y accéder",

	'teams:requests:none' => "Il n'y a pas de membre demandant de rejoindre le groupe en ce moment.",

	'teams:invitations:none' => "Il n'y a pas d'invitations en attente.",

	'item:object:groupforumtopic' => "Sujets de discussion",

	'groupforumtopic:new' => "Ajouter un message à la discussion",

	'teams:count' => "Teams créé(s)",
	'teams:open' => "Team ouverte",
	'teams:closed' => "groupe fermé",
	'teams:member' => "membres",
	'teams:searchtag' => "Rechercher des Teams par mots-clé",

	'teams:more' => "Plus de Teams",
	'teams:none' => "Aucune Team",


	/*
	 * Access
	 */
	'teams:access:private' => "Fermé - Les utilisateurs doivent être invités",
	'teams:access:public' => "Ouvert - N'importe quel utilisateur peut rejoindre la Team",
	'teams:access:group' => "Membres de la Team seulement",
	'teams:closedgroup' => "Cette Team est en adhésion privée.",
	'teams:closedgroup:request' => "Pour demander à être ajouté, cliquer le lien 'Demander une adhésion'.",
	'teams:visibility' => "Qui peut voir cette Team ?",

	/*
	Group tools
	*/
	'teams:enableforum' => "Activer le module 'discussion' du groupe",
	'teams:yes' => "oui",
	'teams:no' => "non",
	'teams:lastupdated' => "Dernière mise à jour %s par %s",
	'teams:lastcomment' => "Dernier commentaire %s by %s",

	/*
	Group discussion
	*/
	'discussion' => "Discussion",
	'discussion:add' => "Ajouter un sujet de discussion",
	'discussion:latest' => "Dernières discussions",
	'discussion:group' => "Groupe de discussion",
	'discussion:none' => "Aucune discussion",
	'discussion:reply:title' => "Réponse par %s",
	
	'discussion:topic:created' => "Le sujet de discussion a été créé.",
	'discussion:topic:updated' => "Le sujet de discussion a été mis à jour.",
	'discussion:topic:deleted' => "Le sujet de discussion a été supprimée.",

	'discussion:topic:notfound' => "Le sujet de discussion est introuvable",
	'discussion:error:notsaved' => "Impossible d'enregistrer ce sujet",
	'discussion:error:missing' => "Les deux champs 'titre' et 'message' sont obligatoires",
	'discussion:error:permissions' => "Vous n'avez pas les autorisations pour effectuer cette action",
	'discussion:error:notdeleted' => "Impossible de supprimer le sujet de discussion",

	'discussion:reply:deleted' => "La réponse de la discussion a été supprimée.",
	'discussion:reply:error:notdeleted' => "Impossible de supprimer la réponse de la discussion",

	'reply:this' => "Répondre à çà",

	'group:replies' => "Réponses",
	'teams:forum:created' => "Créé %s avec %d commentaires",
	'teams:forum:created:single' => "Créé %s avec %d réponse",
	'teams:forum' => "Discussion",
	'teams:addtopic' => "Ajouter un sujet",
	'teams:forumlatest' => "Dernière discussion",
	'teams:latestdiscussion' => "Dernières discussions",
	'teams:newest' => "Les plus récentes",
	'teams:popular' => "Populaires",
	'teamspost:success' => "Votre réponse a été publié avec succès",
	'teams:alldiscussion' => "Dernière discussion",
	'teams:edittopic' => "Modifier le sujet",
	'teams:topicmessage' => "Message du sujet",
	'teams:topicstatus' => "Statut du sujet",
	'teams:reply' => "Publier un commentaire",
	'teams:topic' => "Sujets",
	'teams:posts' => "Posts",
	'teams:lastperson' => "Dernière personne",
	'teams:when' => "Quand",
	'grouptopic:notcreated' => "Aucun sujet n'a été créé.",
	'teams:topicopen' => "Ouvert",
	'teams:topicclosed' => "Fermé",
	'teams:topicresolved' => "Résolu",
	'grouptopic:created' => "Votre sujet a été créé.",
	'teamstopic:deleted' => "Sujet supprimé",
	'teams:topicsticky' => "Sticky",
	'teams:topicisclosed' => "Cette discussion sujet est fermée.",
	'teams:topiccloseddesc' => "Cette discussion a été fermée et n'accepte plus de nouveaux commentaires.",
	'grouptopic:error' => "Votre sujet n'a pas pu être créé. Merci d'essayer plus tard ou de contacter un administrateur du système.",
	'teams:forumpost:edited' => "Vous avez modifié ce billet avec succés.",
	'teams:forumpost:error' => "Il y a eu un problème lors de la modification du billet.",


	'teams:privategroup' => "Ce groupe est privé. Il est nécessaire de demander une adhésion.",
	'teams:notitle' => "Les Teams doivent avoir un titre",
	'teams:cantjoin' => "N'a pas pu rejoindre le groupe",
	'teams:cantleave' => "N'a pas pu quitter le groupe",
	'teams:removeuser' => "Retirer du groupe",
	'teams:cantremove' => "Ne peut retirer l'utilisateur du groupe",
	'teams:removed' => "Retiré du groupe %s avec succès",

        'teams:removemember' => "Retirer un membre" ,
        'teams:cantremoveowner' => "le propriétaire ne peut être retiré" ,
        'teams:remove' => "Retirer" ,
        'teams:removeuser' => "%s a été retiré de la Team %s",


	'teams:addedtogroup' => "A ajouté avec succés l'utilisateur à la Team",
	'teams:joinrequestnotmade' => "La demande d'adhésion n'a pas pu être réalisée",
	'teams:joinrequestmade' => "La demande d'adhésion s'est déroulée avec succés",
	'teams:joined' => "Vous avez rejoint la Team avec succés !",
	'teams:left' => "Vous avez quitter la Team avec succés",
	'teams:notowner' => "Désolé, vous n'êtes pas le propriétaire de la Team.",
	'teams:notmember' => "Désolé, vous n'êtes pas membre de cette Team.",
	'teams:alreadymember' => "Vous êtes déjà membre de cette Team !",
	'teams:userinvited' => "L'utilisateur a été invité.",
	'teams:usernotinvited' => "L'utilisateur n'a pas pu être invité",
	'teams:useralreadyinvited' => "L'utilisateur a déjà été invité",
	'teams:invite:subject' => "%s vous avez été invité(e) à rejoindre %s !",
	'teams:updated' => "Derniere réponse par %s %s",
	'teams:started' => "Démarré par %s",
	'teams:joinrequest:remove:check' => "Etes-vous sûr de vouloir supprimer cette demande d'adhésion ?",
	'teams:invite:remove:check' => "Etes-vous sûr de vouloir supprimer cette invitation ?",
	'teams:invite:body' => "Bonjour %s,

Vous avez été invité(e) à rejoindre le groupe '%s' cliquez sur le lien ci-dessous pour confirmer:

%s",

	'teams:welcome:subject' => "Bienvenue dans le groupe %s !",
	'teams:welcome:body' => "Bonjour %s !
		
Vous êtes maintenant membre du groupe '%s' ! Cliquez le lien ci-dessous pour commencer à participer !

%s",

	'teams:request:subject' => "%s a demandé une adhésion à %s",
	'teams:request:body' => "Bonjour %s,

%s a demandé à rejoindre le groupe '%s', cliquez le lien ci-dessous pour voir son profil :

%s

ou cliquez le lien ci-dessous pour confirmer son adhésion :

%s",

	/*
		Forum river items
	*/

	'river:create:group:default' => "%s a créé le groupe %s",
	'river:join:group:default' => "%s a rejoint le groupe %s",
	'river:create:object:groupforumtopic' => "%s a ajouté un nouveau sujet de discussion %s",
	'river:reply:object:groupforumtopic' => "%s a répondu sur le sujet de discussion %s",
	
	'teams:nowidgets' => "Aucun widget n'ont été défini pour ce groupe.",


	'teams:widgets:members:title' => "Membres du groupe",
	'teams:widgets:members:description' => "Lister les membres d'un groupe.",
	'teams:widgets:members:label:displaynum' => "Lister les membres d'un groupe.",
	'teams:widgets:members:label:pleaseedit' => "Merci de configurer ce widget.",

	'teams:widgets:entities:title' => "Objets dans le groupe",
	'teams:widgets:entities:description' => "Lister les objets enregistré dans ce groupe",
	'teams:widgets:entities:label:displaynum' => "Lister les objets d'un groupe.",
	'teams:widgets:entities:label:pleaseedit' => "Merci de configurer ce widget.",

	'teams:forumtopic:edited' => "Sujet du forum modifié avec succés.",

	'teams:allowhiddenteams' => "Voulez-vous permettre les Teams privés (invisibles) ?",

	/**
	 * Action messages
	 */
	'group:deleted' => "Contenus du groupe et groupe supprimés",
	'group:notdeleted' => "Le groupe n'a pas pu être supprimé",

	'group:notfound' => "Impossible de trouver le groupe",
	'grouppost:deleted' => "La publication dans le groupe a été effacée",
	'grouppost:notdeleted' => "La publication dans le groupe n'a pas pu être effacée",
	'teamstopic:deleted' => "Sujet supprimé",
	'teamstopic:notdeleted' => "Le sujet n'a pas pu être supprimé",
	'grouptopic:blank' => "Pas de sujet",
	'grouptopic:notfound' => "Le sujet n'a pu être trouvé",
	'grouppost:nopost' => "Pas d'articles",
	'teams:deletewarning' => "Etes-vous sur de vouloir supprimer ce groupe ? Cette action est irréversible !",

	'teams:invitekilled' => "L'invitation a été supprimée",
	'teams:joinrequestkilled' => "La demande d'adhésion a été supprimée.",

	// ecml
	'teams:ecml:discussion' => "Discussions de groupe",
	'teams:ecml:groupprofile' => "Les profils de groupe",

);

add_translation("fr", $french);
