
// VetoDlg.cpp : fichier d'implémentation
//

#include "pch.h"
#include "framework.h"
#include "Veto.h"
#include "VetoDlg.h"
#include "DlgProxy.h"
#include "afxdialogex.h"
#include "CInfoAnimal.h"
#include "CErreur.h"
#include "CErreurPort.h"
#include <stdio.h>
#include <iostream>
#include <Windows.h>
#include <fstream>	

#ifdef _DEBUG
#define new DEBUG_NEW
#endif


// boîte de dialogue CAboutDlg utilisée pour la boîte de dialogue 'À propos de' pour votre application

class CAboutDlg : public CDialogEx
{
public:
	CAboutDlg();

// Données de boîte de dialogue
#ifdef AFX_DESIGN_TIME
	enum { IDD = IDD_ABOUTBOX };
#endif

	protected:
	virtual void DoDataExchange(CDataExchange* pDX);    // Prise en charge de DDX/DDV

// Implémentation
protected:
	DECLARE_MESSAGE_MAP()
};

CAboutDlg::CAboutDlg() : CDialogEx(IDD_ABOUTBOX)
{
	EnableActiveAccessibility();
}

void CAboutDlg::DoDataExchange(CDataExchange* pDX)
{
	CDialogEx::DoDataExchange(pDX);
}

BEGIN_MESSAGE_MAP(CAboutDlg, CDialogEx)
END_MESSAGE_MAP()


// boîte de dialogue de CVetoDlg


IMPLEMENT_DYNAMIC(CVetoDlg, CDialogEx);

CVetoDlg::CVetoDlg(CWnd* pParent /*=nullptr*/)
	: CDialogEx(IDD_VETO_DIALOG, pParent)
{
	EnableActiveAccessibility();
	m_hIcon = AfxGetApp()->LoadIcon(IDR_MAINFRAME);
	m_pAutoProxy = nullptr;
}

CVetoDlg::~CVetoDlg()
{
	// S'il existe un proxy Automation pour cette boîte de dialogue, définir
	//  la valeur null de son pointeur arrière vers cette boîte de dialogue, afin qu'il sache
	//  que celle-ci a été supprimée.
	if (m_pAutoProxy != nullptr)
		m_pAutoProxy->m_pDialog = nullptr;
}

void CVetoDlg::DoDataExchange(CDataExchange* pDX)
{
	CDialogEx::DoDataExchange(pDX);
	DDX_Control(pDX, IDC_StopScan, m_StopScan);
	DDX_Control(pDX, ID_ExeScan, m_ExeScan);
	DDX_Control(pDX, IDC_VoirFiche, m_VoirFiche);
	DDX_Control(pDX, IDC_LIST_NumScan, m_NumScan);
}

BEGIN_MESSAGE_MAP(CVetoDlg, CDialogEx)
	ON_WM_SYSCOMMAND()
	ON_WM_CLOSE()
	ON_WM_PAINT()
	ON_WM_QUERYDRAGICON()
	ON_BN_CLICKED(IDC_ExeWEB, &CVetoDlg::OnBnClickedExeweb)
	ON_BN_CLICKED(ID_ExeScan, &CVetoDlg::OnBnClickedExescan)
	ON_BN_CLICKED(IDC_VoirFiche, &CVetoDlg::OnBnClickedVoirfiche)
	ON_BN_CLICKED(IDC_StopScan, &CVetoDlg::OnBnClickedStopscan)
END_MESSAGE_MAP()


// gestionnaires de messages de CVetoDlg

BOOL CVetoDlg::OnInitDialog()
{
	CDialogEx::OnInitDialog();

	// Ajouter l'élément de menu "À propos de..." au menu Système.

	// IDM_ABOUTBOX doit se trouver dans la plage des commandes système.
	ASSERT((IDM_ABOUTBOX & 0xFFF0) == IDM_ABOUTBOX);
	ASSERT(IDM_ABOUTBOX < 0xF000);

	CMenu* pSysMenu = GetSystemMenu(FALSE);
	if (pSysMenu != nullptr)
	{
		BOOL bNameValid;
		CString strAboutMenu;
		bNameValid = strAboutMenu.LoadString(IDS_ABOUTBOX);
		ASSERT(bNameValid);
		if (!strAboutMenu.IsEmpty())
		{
			pSysMenu->AppendMenu(MF_SEPARATOR);
			pSysMenu->AppendMenu(MF_STRING, IDM_ABOUTBOX, strAboutMenu);
		}
	}

	// Définir l'icône de cette boîte de dialogue.  L'infrastructure effectue cela automatiquement
	//  lorsque la fenêtre principale de l'application n'est pas une boîte de dialogue
	SetIcon(m_hIcon, TRUE);			// Définir une grande icône
	SetIcon(m_hIcon, FALSE);		// Définir une petite icône

	// TODO: ajoutez ici une initialisation supplémentaire

	return TRUE;  // retourne TRUE, sauf si vous avez défini le focus sur un contrôle
}

void CVetoDlg::OnSysCommand(UINT nID, LPARAM lParam)
{
	if ((nID & 0xFFF0) == IDM_ABOUTBOX)
	{
		CAboutDlg dlgAbout;
		dlgAbout.DoModal();
	}
	else
	{
		CDialogEx::OnSysCommand(nID, lParam);
	}
}

// Si vous ajoutez un bouton Réduire à votre boîte de dialogue, vous devez utiliser le code ci-dessous
//  pour dessiner l'icône.  Pour les applications MFC utilisant le modèle Document/Vue,
//  cela est fait automatiquement par l'infrastructure.

void CVetoDlg::OnPaint()
{
	if (IsIconic())
	{
		CPaintDC dc(this); // contexte de périphérique pour la peinture

		SendMessage(WM_ICONERASEBKGND, reinterpret_cast<WPARAM>(dc.GetSafeHdc()), 0);

		// Centrer l'icône dans le rectangle client
		int cxIcon = GetSystemMetrics(SM_CXICON);
		int cyIcon = GetSystemMetrics(SM_CYICON);
		CRect rect;
		GetClientRect(&rect);
		int x = (rect.Width() - cxIcon + 1) / 2;
		int y = (rect.Height() - cyIcon + 1) / 2;

		// Dessiner l'icône
		dc.DrawIcon(x, y, m_hIcon);
	}
	else
	{
		CDialogEx::OnPaint();
	}
}

// Le système appelle cette fonction pour obtenir le curseur à afficher lorsque l'utilisateur fait glisser
//  la fenêtre réduite.
HCURSOR CVetoDlg::OnQueryDragIcon()
{
	return static_cast<HCURSOR>(m_hIcon);
}

// Les serveurs Automation ne doivent pas quitter lorsqu'un utilisateur ferme l'interface utilisateur
//  alors qu'un contrôleur est encore placé sur l'un de ses objets.  Ces
//  gestionnaires de messages s'assurent que
//  l'interface utilisateur est masquée si le proxy est en cours d'utilisation, mais que la boîte de dialogue demeure s'il est
//  fermé.

void CVetoDlg::OnClose()
{
	if (CanExit())
		CDialogEx::OnClose();
}

void CVetoDlg::OnOK()
{
	if (CanExit())
		CDialogEx::OnOK();
}

void CVetoDlg::OnCancel()
{
	if (CanExit())
		CDialogEx::OnCancel();
}

BOOL CVetoDlg::CanExit()
{
	// Si l'objet proxy est encore présent, le contrôleur
	//  Automation reste placé sur cette application.  Conserver
	//  la boîte de dialogue, mais masquer l'interface utilisateur associée.
	if (m_pAutoProxy != nullptr)
	{
		ShowWindow(SW_HIDE);
		return FALSE;
	}

	return TRUE;
}






void CVetoDlg::OnBnClickedExeweb()
{ 
	system("start https://romslegends.fr");
}





void CVetoDlg::OnBnClickedExescan()
{
	m_ExeScan.EnableWindow(FALSE);								// Désactiver le bouton exécuter scan
	m_VoirFiche.EnableWindow(FALSE);							// Désactiver le bouton voir fiche
	m_StopScan.EnableWindow(TRUE);								// Activé bouton stopper scan

	DCB dcb;													// Déclarer une variable contenant la configuration du port
	HANDLE OuvPort;												// Tableau ID attribué, seulement vu par les fonctions gérante
	DWORD bytesRead;											// Alloue et initialise éventuellement un mot double (4 octets) de stockage pour chaque initialiseur
	using namespace std;										// std
	LPVOID buffer[1];											// Reçoit les données lues à partir d'un fichier ou d'un appareil


	// ----------------------------------------------------------Ouverture du port série ---------------------------------------------------------------------------

	OuvPort = CreateFile(L"COM5",					// Numéro du port
			  GENERIC_READ | GENERIC_WRITE,			// Mode accès
			  0,									// Mode partage
			  NULL,									// Adresse de sécurité
			  OPEN_EXISTING,						// how to create
			  0,									// file attributes
			  NULL);								// handle of file with attributes to copy
	
	// -----------------------------------------------------Verification si port (handle) est bien ouvert-----------------------------------------------------------

	if (OuvPort == INVALID_HANDLE_VALUE) // Si impossible d'ouvrir le port serie
	{
		
		CErreurPort ErreurPort;
		ErreurPort.DoModal();
		CloseHandle(OuvPort);
	}

	else
	{
		// ----------------------------------------------------------Configuration de la communication-----------------------------------------------------------------

		DCB dcbSerieParam = { 0 };
		dcbSerieParam.DCBlength = sizeof(dcbSerieParam);

		if (!GetCommState(OuvPort, &dcbSerieParam)) // Si impossible de récupérer les paramètres du port série 
		{

			CErreur Erreur;
			Erreur.DoModal();
			CloseHandle(OuvPort);

		}
		else
		{

			dcbSerieParam.BaudRate = CBR_9600;
			dcbSerieParam.ByteSize = 8;
			dcbSerieParam.StopBits = ONESTOPBIT;
			dcbSerieParam.Parity = NOPARITY;

			if (!SetCommState(OuvPort, &dcbSerieParam)) // Si impossible de configurer le port série
			{

				CErreur Erreur;
				Erreur.DoModal();
				CloseHandle(OuvPort);

			}

			// ----------------------------------------------------------------Lecture des données----------------------------------------------------------------------

			if (ReadFile(OuvPort, buffer, sizeof(buffer), &bytesRead, NULL))
			{
				// Affichage des données lues
				std::cout << "Donnees lues : " << buffer << std::endl;
				CloseHandle(OuvPort);
			}
			else
			{
				//std::cerr << "Erreur lors de la lecture des donnees." << std::endl;
				CloseHandle(OuvPort);
				CErreur Erreur;
				Erreur.DoModal();

			}
		}
	}
		m_StopScan.EnableWindow(FALSE);
		m_VoirFiche.EnableWindow(TRUE);
		m_ExeScan.EnableWindow(TRUE);
	

}


void CVetoDlg::OnBnClickedVoirfiche()
{
	CInfoAnimal InfoAnimal;
	InfoAnimal.DoModal();
}


void CVetoDlg::OnBnClickedStopscan()
{
	CString valeur;
	
	
	
	m_StopScan.EnableWindow(FALSE);
	m_VoirFiche.EnableWindow(TRUE);
	m_ExeScan.EnableWindow(TRUE);
	m_NumScan.AddString(valeur);
}
